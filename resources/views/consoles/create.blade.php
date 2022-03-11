@extends('layout')

@section('content')
    <h2 class="display-6">Cadastrar Console</h2>

    <form action="{{ route ('consoles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" autocomplete="off" required>
        </div>
        <button class="btn btn-outline-primary">Salvar</button>
    </form>
@endsection
