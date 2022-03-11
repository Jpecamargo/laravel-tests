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

    public function create(){
        return view('consoles/create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $console = new Console([
            'name' => $request->name
        ]);
        $console->save();

        return redirect() -> route('console.index') -> with('succes','Console cadastrado com sucesso');
    }

    public function edit($id){
        $console = Console::find($id);
        return view('console.edit') -> with('console', $console);
    }

    public function update(Request $request, $id){
        $request -> validate([
            'name' => 'required'
        ]);

        $console = Console::find($id);
        $console -> name = $request->get('name');
        $console -> update();

        return redirect() -> route('console.index') -> with('success', 'Console atualizado com sucesso');
    }

    public function destroy($id){
        Console::where('id',$id)->delete();
        return redirect() -> route('console.index') -> with('success', 'Console apagado com sucesso');
    }
}
