@extends('layout')

@section('content')
    <h2 class="display-6">Lista de jogos</h2>
    @if ($message = Session::GET('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
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
                        <form action="{{ route('games.destroy',$game->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('games.edit',$game->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
