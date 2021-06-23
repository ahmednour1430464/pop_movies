<?php

namespace App\Http\Controllers;

use App\ViewModels\MoviesViewModel;
use App\ViewModels\MovieViewModel;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Http::withToken(config('services.tmdb.access_token'))
            ->get(config('services.tmdb.api_url').'movie/popular')
            ->json('results');
        $playedNowMovies = Http::withToken(config('services.tmdb.access_token'))
            ->get(config('services.tmdb.api_url').'movie/now_playing')
            ->json('results');
        $genresArray = Http::withToken(config('services.tmdb.access_token'))
            ->get(config('services.tmdb.api_url').'genre/movie/list')
            ->json('genres');

        

        $moviesViewModel=new MoviesViewModel($movies,$playedNowMovies,$genresArray);

        return view('movies.popmovies',$moviesViewModel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::withToken(config('services.tmdb.access_token'))
            ->get(config('services.tmdb.api_url').'movie/'.$id.'?append_to_response=credits,videos,images')
            ->json();

        $movieViewModel=new MovieViewModel($movie);
        return view('movie_details.movieDetails',$movieViewModel);
    }
}
