@extends('layout')

@section('content')
    <h2 class="display-6">Editar Console</h2>
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
    <form action="{{ route ('consoles.update', ['id'=>$console->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" autocomplete="off" value="{{ $console->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Cor:</label>

            <input type="radio" class="btn-check" name="color" id="primary-outlined" value="primary" autocomplete="off" {{ $console->color == 'primary' ? 'checked' : '' }}>
            <label class="btn btn-outline-primary btn-sm" for="primary-outlined">Azul</label>

            <input type="radio" class="btn-check" name="color" id="secondary-outlined"  value="secondary" autocomplete="off" {{ $console->color == 'secondary' ? 'checked' : '' }}>
            <label class="btn btn-outline-secondary btn-sm" for="secondary-outlined">Cinza</label>

            <input type="radio" class="btn-check" name="color" id="success-outlined" value="success" autocomplete="off" {{ $console->color == 'success' ? 'checked' : '' }}>
            <label class="btn btn-outline-success btn-sm" for="success-outlined">Verde</label>

            <input type="radio" class="btn-check" name="color" id="danger-outlined" value="danger" autocomplete="off" {{ $console->color == 'danger' ? 'checked' : '' }}>
            <label class="btn btn-outline-danger btn-sm" for="danger-outlined">Vermelho</label>

            <input type="radio" class="btn-check" name="color" id="warning-outlined"  value="warning" autocomplete="off" {{ $console->color == 'warning' ? 'checked' : '' }}>
            <label class="btn btn-outline-warning btn-sm" for="warning-outlined">Amarelo</label>

            <input type="radio" class="btn-check" name="color" id="info-outlined" value="info" autocomplete="off" {{ $console->color == 'info' ? 'checked' : '' }}>
            <label class="btn btn-outline-info btn-sm" for="info-outlined">Ciano</label>
        </div>
        <button class="btn btn-outline-primary">Salvar</button>
    </form>
@endsection
