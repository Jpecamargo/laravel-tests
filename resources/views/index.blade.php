@extends('layout')

@section('content')
    <div class="card mb-3">
        <div class="row">
            <div class="col-md-4">
                <svg class="bd-placeholder-img img-fluid rounded-start" width="100%" height="250"
                     xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image"
                     preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image</text>
                </svg>
            </div>
            <div class="col-md-8 p-3">
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
