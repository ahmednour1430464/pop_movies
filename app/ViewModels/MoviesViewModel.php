<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MoviesViewModel extends ViewModel
{
    private  $movies;
    private  $playedNowMovies;
    private  $genres;

    public function __construct($movies, $playedNowMovies, $genres)
    {
        $this->movies = $movies;
        $this->playedNowMovies = $playedNowMovies;
        $this->genres = $genres;
    }

    public function movies()
    {
        return $this->formateMovies($this->movies);
    }
    public function playedNowMovies()
    {
        return $this->formateMovies($this->playedNowMovies);
    }
    private function genres()
    {
        return collect($this->genres)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formateMovies($movies)
    {
        return collect($movies)->map(function ($movie) {
            $formatGenres = collect($movie['genre_ids'])->mapWithKeys(function($value){
                return [$value=>$this->genres()->get($value)];
            })->implode(', ');
            return collect($movie)->merge([
                'poster_path' => config('services.tmdb.api_img_url').'/w500' . $movie['poster_path'],
                'vote_average' => $movie['vote_average'] * 10 . "%",
                'release_date' => Carbon::parse($movie['release_date'])->format('M D,Y'),
                'genres' => $formatGenres,
            ])->only([
                'id',
                'poster_path',
                'original_title',
                'vote_average',
                'release_date',
                'genres',
            ]);
        });
    }
}
