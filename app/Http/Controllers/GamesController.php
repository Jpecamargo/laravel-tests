<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GamesController extends Controller
{
    public function create()
    {
        return view ('create');
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
