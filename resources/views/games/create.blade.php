@extends('layout')

@section('content')
    <h2 class="display-6">Cadastrar jogo</h2>

    <form action="{{ route ('games.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" autocomplete="off" required>
        </div>
        <div class="mb-3">
            @foreach($consoles as $console)
                <input type="checkbox" class="btn-check" id="{{ $console->id }}" value="{{ $console->id }}" name="console[]" autocomplete="off">
                <label class="btn btn-outline-primary btn-sm" for="{{ $console->id }}">{{ $console->name }}</label>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descrição</label>
            <textarea class="form-control" rows="3" name="description" id="desc" maxlength="255" required></textarea>
        </div>
        <button class="btn btn-outline-primary">Salvar</button>
    </form>
@endsection
