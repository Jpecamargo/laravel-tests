<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Console;

class GamesController extends Controller
{
    public function index(){
        $games = Game::all();
        return view('games/index', compact('games','games'));
    }

    public function search(Request $request){
        $search = $request->input('search');

        $games = Game::query()->where('name','like',"%{$search}%")->get();

        return view('games/index',compact('games'));
    }

    public function create()
    {
        $consoles = Console::all();
        return view ('games/create',compact('consoles','consoles'));
    }

    public function store(Request $request){
        $request -> validate([
           'name' => 'required',
           'description' => 'required',
        ]);

        $game = new Game([
           'name' => $request->name,
           'description' => $request->description,
           'gender' => $request->gender??null
        ]);
        $game->save();

        $game->consoles()->sync($request->console);

        return redirect() -> route('games.index') -> with('success','Jogo cadastrado com sucesso');
    }

//  public function edit(Game $game){
//      return view('games/edit',compact('game'));
//  }
//Não funciona

    public function edit($id){
        $game = Game::find($id);
        return view('games.edit')->with('game',$game);
    }

    public function update(Request $request, $id){
        $request -> validate([
            'name'=>'required',
            'description'=>'required'
        ]);

        $game = Game::find($id);
        $game->name = $request->get('name');
        $game->description = $request->get('description');

        $game->update();
        return redirect() -> route('games.index') -> with('success','Jogo atualizado com sucesso');
    }

    public function destroy($id){
        Game::where('id',$id)->delete();
        return redirect() -> route('games.index') -> with('success','Jogo excluído com sucesso');
    }

//    public function destroy(Game $game){
//        $game->delete();
//        return redirect('/jogos') -> with('success','Jogo excluído com sucesso');
//    }
//Perguntar ao Luan pq dessa forma não funcionou

//Testar:
//$game = Game::Find($id);
//$game->delete();

}
