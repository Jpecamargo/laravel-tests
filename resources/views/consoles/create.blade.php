@extends('layout')

@section('content')
    <h2 class="display-6">Cadastrar Console</h2>

    <form action="{{ route ('consoles.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Cor:</label>

            <input type="radio" class="btn-check" name="color" id="primary-outlined" value="primary" autocomplete="off">
            <label class="btn btn-outline-primary btn-sm" for="primary-outlined">Azul</label>

            <input type="radio" class="btn-check" name="color" id="secondary-outlined"  value="secondary" autocomplete="off">
            <label class="btn btn-outline-secondary btn-sm" for="secondary-outlined">Cinza</label>

            <input type="radio" class="btn-check" name="color" id="success-outlined" value="success" autocomplete="off">
            <label class="btn btn-outline-success btn-sm" for="success-outlined">Verde</label>

            <input type="radio" class="btn-check" name="color" id="danger-outlined" value="danger" autocomplete="off">
            <label class="btn btn-outline-danger btn-sm" for="danger-outlined">Vermelho</label>

            <input type="radio" class="btn-check" name="color" id="warning-outlined"  value="warning" autocomplete="off">
            <label class="btn btn-outline-warning btn-sm" for="warning-outlined">Amarelo</label>

            <input type="radio" class="btn-check" name="color" id="info-outlined" value="info" autocomplete="off">
            <label class="btn btn-outline-info btn-sm" for="info-outlined">Ciano</label>
        </div>
        <button class="btn btn-outline-primary">Salvar</button>
    </form>
@endsection
