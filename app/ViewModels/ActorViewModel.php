<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class ActorViewModel extends ViewModel
{
    public $actor;
    public $credits;
    public $social;
    public function __construct($actor, $credits, $social)
    {
        $this->actor = $actor;
        $this->credits = $credits;
        $this->social = $social;
    }
    public function actor()
    {
        return collect($this->actor)->merge([
            'birthday' => Carbon::parse($this->actor['birthday'])->format('M j,Y'),
            'age' => Carbon::parse($this->actor['birthday'])->age,
            'image_link' => config('services.tmdb.api_img_url') . '/w500' . $this->actor['profile_path']
        ])->only([
            'name', 'birthday', 'age', 'image_link', 'homepage', 'place_of_birth', 'biography'
        ]);
    }
    public function social()
    {
        return collect($this->social)->merge([
            'facebook_id' => 'https://www.facebook.com/' . $this->social['facebook_id'],
            'twitter_id' => 'https://twitter.com/' . $this->social['twitter_id'],
            'instagram_id' => 'https://www.instagram.com/' . $this->social['instagram_id'],
        ]);
    }
    public function knownForMovies()
    {
        return collect($this->credits)->where('media_type', 'movie')->sortByDesc('popularity')
            ->take(5)->map(function ($movie) {
                return collect($movie)
                    ->merge([
                        'poster_link' => config('services.tmdb.api_img_url') . '/w500' . $movie['poster_path']
                    ])->only(
                        'id',
                        'title',
                        'poster_link'
                    );
            });
    }
    public function credits()
    {
        return collect($this->credits)->map(function ($movie) {

            if (isset($movie['release_date'])) {
                $releaseDate = $movie['release_date'];
            } elseif (isset($movie['first_air_date'])) {
                $releaseDate = $movie['first_air_date'];
            } else {
                $releaseDate = '';
            }
            if (isset($movie['title'])) {
                $name = $movie['title'];
            } elseif (isset($movie['name'])) {
                $name = $movie['name'];
            }

            return collect($movie)->merge([
                'release_date' => $releaseDate,
                'year' => isset($releaseDate) ? Carbon::parse($releaseDate)->format('Y') : 'future',
                'title'=>$name,
            ])->only([
                'year','title','release_date','character'
            ]);
        })->sortByDesc('release_date')->dump();
    }
}
