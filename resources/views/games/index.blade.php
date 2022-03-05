@extends('layout')

@section('content')
    <h2 class="display-6">Lista de jogos</h2>

    <form action="">
        <div class="row">
            <div class="form-group col-9">
                <input type="text" class="form-control" name="search" id="search" placeholder="Nome do jogo">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-outline-primary">Buscar</button>
                <a href="{{ route('games.create') }}" class="btn btn-outline-info">Novo Jogo</a>
            </div>
        </div>
    </form>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Descrição</th>
            <th scope="col">Opções</th>
        </tr>
        </thead>
        <tbody>
        @foreach($games as $game)
            <tr>
                <td class="col-3">{{ $game->name }}</td>
                <td>{{ $game->description }}</td>
                <td class="col-2">
                    <a href="#" class="btn btn-sm btn-warning">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Apagar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
