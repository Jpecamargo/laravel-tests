<?php

namespace App\Http\Controllers;

use App\Models\Console;
use Illuminate\Http\Request;

class ConsolesController extends Controller
{
    public function index(){
        $consoles = Console::all();
        return view('consoles/index', compact('consoles','consoles'));
    }

    public function search(Request $request){
        $search = $request -> input('search');
        $consoles = Console::query()->where('name','like',"%{$search}%")->get();
        return view('consoles/index', compact('consoles'));
    }

    public function create(){
        return view('consoles/create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'color'=> 'required'
        ]);

        $console = new Console([
            'name' => $request->name,
            'color'=> $request->color
        ]);
        $console->save();

        return redirect() -> route('consoles.index') -> with('succes','Console cadastrado com sucesso');
    }

    public function edit($id){
        $console = Console::find($id);
        return view('consoles.edit') -> with('console', $console);
    }

    public function update(Request $request, $id){
        $request -> validate([
            'name' => 'required',
            'color' => 'required'
        ]);

        $console = Console::find($id);
        $console -> name = $request->name;
        $console -> color = $request->color;
        $console -> update();

        return redirect() -> route('consoles.index') -> with('success', 'Console atualizado com sucesso');
    }

    public function destroy($id){
        $console = Console::find($id);
        $console -> games() -> detach();
        $console -> delete();
        return redirect() -> route('consoles.index') -> with('success', 'Console apagado com sucesso');
    }
}
