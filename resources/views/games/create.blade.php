@extends('layout')

@section('content')
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

    <h2 class="display-6">Cadastrar jogo</h2>

    <form action="{{ route ('games.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <div class="row">
                <div class="col-7">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" autocomplete="off" required>
                </div>
                <div class="col-5">
                    <label for="formFile" class="form-label">Imagem do jogo</label>
                    <input class="form-control" name="image" type="file" id="file" required>
                </div>
            </div>
        </div>
        <div class="mb-3">
            @foreach($consoles as $console)
                <input type="checkbox" class="btn-check" id="{{ $console->id }}" value="{{ $console->id }}" name="console[]" autocomplete="off">
                <label class="btn btn-outline-primary btn-sm" for="{{ $console->id }}">{{ $console->name }}</label>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea class="form-control" rows="3" name="description" id="description" maxlength="255" required></textarea>
        </div>
        <button class="btn btn-outline-primary">Salvar</button>
    </form>
@endsection
