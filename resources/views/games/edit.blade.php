@extends('layout')

@section('content')
    <h2 class="display-6">Editar jogo</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <p>Opa! Parece que tem algo errado.</p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route ('games.update', ['id'=>$game->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" autocomplete="off" value="{{ $game->name }}" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descrição</label>
            <textarea class="form-control" rows="3" name="description" id="desc" maxlength="255" required>{{ $game->description }}</textarea>
        </div>
        <button class="btn btn-outline-primary">Salvar</button>
    </form>
@endsection
