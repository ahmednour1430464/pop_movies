<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class MovieViewModel extends ViewModel
{
    private $movie;
    public function __construct($movie)
    {
        $this->movie = $movie;
    }

    public function movie()
    {
        return $this->formateMovies($this->movie);
    }
    private function genres()
    {
        return collect($this->movie['genres'])->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        })->implode(', ');
    }

    private function formateMovies($movie)
    {

        return collect($movie)->merge([
            'poster_path' => config('services.tmdb.api_img_url').'/w500' . $movie['poster_path'],
            'vote_average' => $movie['vote_average'] * 10 . "%",
            'release_date' => Carbon::parse($movie['release_date'])->format('M D,Y'),
            'youtube_video' => 'https://www.youtube.com/embed/' . $movie['videos']['results'][0]['key'],
            'genres' => $this->genres(),
            'crew' => collect($movie['credits']['crew'])->take(2)->map(function ($crew) {
                return collect($crew)->only([
                    'name',
                    'job'
                ]);
            }),
            'cast' => collect($movie['credits']['cast'])->take(5)->map(function ($cast) {
                return collect($cast)->merge([
                    'image_link' => config('services.tmdb.api_img_url').'/w500'. $cast['profile_path'],
                ])->only([
                    'id',
                    'image_link',
                    'name',
                    'character'
                ]);
            }),
            'images' => collect($movie['images']['backdrops'])->take(9)->map(function ($image) {
                return collect($image)->merge([
                    'image_link' => config('services.tmdb.api_img_url').'/w500' . $image['file_path'],
                    'image_original_link' => config('services.tmdb.api_img_url') .'/original'. $image['file_path'],
                ]);
            }),
        ])->only([
            'original_title',
            'overview',
            'poster_path',
            'vote_average',
            'release_date',
            'youtube_video',
            'genres',
            'crew',
            'cast',
            'images',
        ]);
    }
}
