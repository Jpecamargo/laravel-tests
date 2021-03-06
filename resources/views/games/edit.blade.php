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
    <form action="{{ route ('games.update', ['id'=>$game->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-7">
                <label for="" class="form-label">Nome</label>
                <input type="text" class="form-control" name="name" autocomplete="off" value="{{ $game->name }}" required>
            </div>
            <div class="col-5">
                <label for="formFile" class="form-label">Imagem do jogo</label>
                <input class="form-control" name="image" type="file" id="file">
            </div>
        </div>
        <div class="mb-3">
            @foreach($consoles as $console)
                <input type="checkbox" class="btn-check" id="{{ $console->id }}" value="{{ $console->id }}" name="console[]" autocomplete="off" {{ in_array($console->id,$relations) ? 'checked' : '' }}>
                <label class="btn btn-outline-primary btn-sm" for="{{ $console->id }}">{{ $console->name }}</label>
            @endforeach
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Descrição</label>
            <textarea class="form-control" rows="3" name="description" id="desc" maxlength="255" required>{{ $game->description }}</textarea>
        </div>
        <button class="btn btn-outline-primary">Salvar</button>
    </form>
@endsection
