<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Console;

class GamesController extends Controller
{
    public function home(){
        $games = Game::latest()->paginate(15);
        return view('index',compact('games'));
    }

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
            'image' => $this->saveImage($request->file('image'))
        ]);

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

        if(is_null($request->image)){
            $game->image;
        } else {
            unlink('image/'.$game->image);
            $game->image = $this->saveImage($request->file('image'));
        }

       // $game->image = is_null($request->image) ? $game->image : (unlink('image/'.$game->image) AND $this->saveImage($request->file('image')));

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

    public function saveImage($originalImage){
        $destinationPath = 'image/';
        $profileImage = date('YmdHis') . '.' . $originalImage -> getClientOriginalExtension();
        $originalImage->move($destinationPath,$profileImage);
        return "$profileImage";
    }

//    public function destroy(Game $game){
//        $game->delete();
//        return redirect('/jogos') -> with('success','Jogo excluído com sucesso');
//    }
//Perguntar ao Luan pq dessa forma não funcionou
}
