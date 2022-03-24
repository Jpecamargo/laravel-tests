@extends('layout')

@section('content')
    @foreach($games as $game)
        <div class="card mb-3">
            <div class="row">
                <div class="col-md-4 card-image">
                    <img src="/image/{{ $game->image }}" alt="Image">
                </div>
                <div class="col-md-8 col-sm-12 p-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ $game->name }}</h5>
                        <p class="card-text">{{ $game->description }}</p>
                    </div>
                    <div class="game-tag p-3">
                        @foreach($game->consoles as $console)
                        <span class="badge rounded-pill bg-{{ $console->color }}">{{ $console->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
