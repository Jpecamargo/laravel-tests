@extends('layout')

@section('content')
    @if ($message = Session::GET('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <form action="{{ route ('games.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Descrição</label>
            <textarea class="form-control" rows="3" name="description" id="desc" maxlength="255" required></textarea>
        </div>
        <button class="btn btn-outline-primary">Salvar</button>
    </form>
@endsection
