<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class ActorsViewModel extends ViewModel
{
    public $popActors;
    public $page;

    public function __construct($actors, $page)
    {
        $this->popActors = $actors;
        $this->page = $page;
    }

    public function popActors()
    {
        return collect($this->popActors)->map(function ($actor) {
            return collect($actor)->merge([
                'image_link' => $actor['profile_path']
                    ?
                    config('services.tmdb.api_img_url') . '/w235_and_h235_face' . $actor['profile_path']
                    : "https://ui-avatars.com/api/?size=235&name=" . $actor['name'],
                'known_for' => collect($actor['known_for'])->where('media_type', 'movie')->pluck('original_title')->union(
                    collect($actor['known_for'])->where('media_type', 'tv')->pluck('name')
                )->implode(', '),
                'page' => $this->page,
            ])->only(['id', 'name', 'image_link', 'known_for', 'page']);
        });
    }

    public function previous()
    {
        return  $this->page > 1 ? $this->page - 1 : null;
    }

    public function next()
    {
        return $this->page < 500 ? $this->page + 1 : null;
    }
}
