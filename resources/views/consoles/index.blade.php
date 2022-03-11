@extends('layout')

@section('content')
    @if ($message = Session::GET('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <h2 class="display-6">Lista de Consoles</h2>
    <form action="{{ route('consoles.search') }}" method="GET">
        @csrf
        <div class="row">
            <div class="form-group col-9">
                <input type="text" class="form-control" name="search" id="search" placeholder="Nome do console">
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-outline-primary">Buscar</button>
                <a href="{{ route('consoles.create') }}" class="btn btn-outline-info">Novo Console</a>
            </div>
        </div>
    </form>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Opções</th>
        </tr>
        </thead>
        <tbody>
            @foreach($consoles as $console)
                <tr>
                    <td class="col-10">{{ $console->name }}</td>
                    <td class="col-2">
                        <form action="{{ route('consoles.destroy',$console->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('consoles.edit',$console->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <button type="submit" class="btn btn-sm btn-danger">Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
