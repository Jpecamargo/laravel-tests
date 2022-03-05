<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GamesController extends Controller
{
    public function index(){
        $games = Game::all();
        return view('index', compact('games','games')); //Isso tem que ficar no controller do Games Console e na view tem que ser o nome do blade que carrega os jogos
    }
    public function create()
    {
        return view ('games/create');
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

        return redirect('/jogos') -> with('success','Jogo cadastrado com sucesso');
    }
}
