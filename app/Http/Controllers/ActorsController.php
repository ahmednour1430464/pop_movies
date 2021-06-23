<?php

namespace App\Http\Controllers;

use App\ViewModels\ActorsViewModel;
use App\ViewModels\ActorViewModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($page = 1)
    {
        abort_if($page > 500, 204);
        $actors = Http::withToken(config('services.tmdb.access_token'))
            ->get(config('services.tmdb.api_url') . 'person/popular?page=' . $page)
            ->json('results');
        $actorsViewModel = new ActorsViewModel($actors, $page);
        return view('actors.actors', $actorsViewModel);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $actor = Http::withToken(config('services.tmdb.access_token'))
            ->get(config('services.tmdb.api_url').'person/'.$id)
            ->json();
        $credits = Http::withToken(config('services.tmdb.access_token'))
            ->get(config('services.tmdb.api_url').'person/'.$id.'/combined_credits')
            ->json('cast');
        $social = Http::withToken(config('services.tmdb.access_token'))
            ->get(config('services.tmdb.api_url').'person/'.$id.'/external_ids')
            ->json();

        $actorViewModel = new ActorViewModel($actor,$credits,$social);
        return view('actors.actorDetails', $actorViewModel);
    }
}
