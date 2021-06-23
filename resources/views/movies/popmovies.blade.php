@extends('layout.app')

@section('content')
    <div class="container px-4 pt-16 mx-auto">
        <div class="popular_movies">
            <h2 class="text-lg font-semibold tracking-wider text-yellow-500 uppercase">Popular Movies</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-9">
                @foreach ($movies as $movie)
                    <x-movie-card :movie="$movie" />
                @endforeach
            </div>
        </div>

        <div class="mt-16 Now_played">
            <h2 class="text-lg font-semibold tracking-wider text-yellow-500 uppercase">Now Played</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-9">
                @foreach ($playedNowMovies as $movie)
                <x-movie-card :movie="$movie" />
                @endforeach
            </div>
        </div>
    </div>
@endsection
