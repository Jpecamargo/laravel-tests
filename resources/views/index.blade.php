@extends('layout')

@section('content')
    <div class="card mb-3">
        <div class="row">
            <div class="col-md-4">
                <img src="https://source.unsplash.com/random/400x250" alt="Image" width="400" height="250">
            </div>
            <div class="col-md-8 col-sm-12 p-3">
                <div class="card-body">
                    <h5 class="card-title">nome do jogo</h5>
                    <p class="card-text">desc do jogo</p>
                </div>
                <div class="game-tag p-3">
                    <span class="badge rounded-pill bg-success">Xbox One X</span>
                    <span class="badge rounded-pill bg-primary">PS5</span>
                </div>
            </div>
        </div>
    </div>
@endsection
