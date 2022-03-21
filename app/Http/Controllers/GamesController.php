<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Console;

class GamesController extends Controller
{
    public function index(){
        $games = Game::all();
        return view('games/index', compact('games'));
    }

    public function search(Request $request){
        $search = $request->input('search');

        $games = Game::query()->where('name','like',"%{$search}%")->get();

        return view('games/index',compact('games'));
    }

    public function create()
    {
        $consoles = Console::All()->sortBy('name');
        return view ('games/create',compact('consoles'));
    }

    public function store(Request $request){
        $request -> validate([
           'name' => 'required',
           'description' => 'required',
           'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $game = new Game([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image
        ]);

        if($image = $request->file('image')){
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath,$profileImage);
            $game['image'] = "$profileImage";
        }

        $game->save();
        $game->consoles()->attach($request->console);        

        return redirect() -> route('games.index') -> with('success','Jogo cadastrado com sucesso');
    }

//  public function edit(Game $game){
//      return view('games/edit',compact('game'));
//  }
//Não funciona

    public function edit($id){
        $game = Game::find($id);
        $consoles = Console::all()->sortBy('name');
        $relations = $game->consoles()->pluck('console_id')->toArray();
        return view('games.edit',compact('game','consoles','relations'));
    }

    public function update(Request $request, $id){
        $request -> validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $game = Game::find($id);
        $game->name = $request->name;
        $game->description = $request->description;
        $game->image = $request->image;

        if($image = $request->file('image')){
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath,$profileImage);
            $game->image = "$profileImage";
        }

        $game->update();
        $game->consoles()->sync($request->console);

        return redirect() -> route('games.index') -> with('success','Jogo atualizado com sucesso');
    }

    public function destroy($id){
        $game = Game::find($id);
        unlink('image/'.$game->image);
        $game -> consoles() -> detach();
        $game -> delete();
        return redirect() -> route('games.index') -> with('success','Jogo excluído com sucesso');
    }

//    public function destroy(Game $game){
//        $game->delete();
//        return redirect('/jogos') -> with('success','Jogo excluído com sucesso');
//    }
//Perguntar ao Luan pq dessa forma não funcionou
}
