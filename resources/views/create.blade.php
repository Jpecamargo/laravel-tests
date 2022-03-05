@extends('layout')

@section('content')
    <form action="{{ route ('create_game') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descrição</label>
            <textarea class="form-control" rows="3" name="description" id="desc" required></textarea>
        </div>
        <button class="btn btn-outline-primary">Salvar</button>
    </form>
@endsection
