<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamesController extends Controller
{
    public function create()
    {
        return view ('create');
    }

    public function store(Request $request){
        $validated = validate([
            'name' => $request -> name,
            'description' => $request -> description
        ]);

        Game::create([
            'name' => $validate->name;
        ])
    }
}
