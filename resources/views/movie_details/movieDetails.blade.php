@extends('layout.app')

@section('content')
    <div class="mb-4 border-b border-gray-800 movie_info">
        <div class="container flex flex-col px-4 py-32 mx-auto md:flex-row">

            <img class="w-64 " src="{{ $movie['poster_path'] }}" alt="avatar">

            <div class="flex flex-col md:ml-24 pb-16">
                <h2 class="text-4xl font-semibold ">{{ $movie['original_title'] }}</h2>
                <div class="flex items-center mt-1 text-sm">
                    <span>
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="star"
                            class="w-4 text-yellow-500 fill-current" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 576 512">
                            <path
                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                            </path>
                        </svg>
                    </span>
                    <span class="ml-1">{{ $movie['vote_average'] }}</span>
                    <span class="mx-2">|</span>
                    <span class="mr-1">{{ $movie['release_date'] }}</span>
                    <span class="mx-2">|</span>
                    <div class="text-gray-400">
                        {{ $movie['genres'] }}
                    </div>
                </div>
                <p class="my-8 ">
                    {{ $movie['overview'] }}
                </p>
                <div>
                    <h3 class="font-semibold text-white">Featured Crew</h3>
                    @foreach ($movie['crew'] as $crew)

                        <div class="flex mt-4">
                            <h2 class="pr-4">{{ $crew['name'] }}</h2>
                            <h2 class="pl-4">{{ $crew['job'] }}</h2>
                        </div>

                    @endforeach
                </div>
                <div x-data="{isOpen:false,youtube_link:''}">
                    @if ($movie['youtube_video'])
                        <div class="mt-8">
                            <a x-on:click="
                               isOpen = true
                               youtube_link='{{ $movie['youtube_video'] }}'
                            "
                                class="inline-flex items-center px-4 py-2 cursor-pointer text-black transition duration-150 ease-in-out bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:">
                                <svg aria-hidden="true" focusable="false" data-prefix="far" data-icon="play-circle"
                                    class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path
                                        d="M371.7 238l-176-107c-15.8-8.8-35.7 2.5-35.7 21v208c0 18.4 19.8 29.8 35.7 21l176-101c16.4-9.1 16.4-32.8 0-42zM504 256C504 119 393 8 256 8S8 119 8 256s111 248 248 248 248-111 248-248zm-448 0c0-110.5 89.5-200 200-200s200 89.5 200 200-89.5 200-200 200S56 366.5 56 256z">
                                    </path>
                                </svg>
                                <h2 class="ml-2">Play Trailer</h2>
                            </a>
                        </div>
                    @endif

                    <div  x-show.transition.opacity="isOpen" style="background-color:rgba(0,0,0,0.5)"
                        class="fixed top-10 left-0 flex items-center pb-16 w-full h-full overflow-y-auto shadow-lg">
                        <div class="container mx-auto overflow-y-auto rounded-lg lg:px-24 ">
                            <div class="bg-gray-900 rounded">
                                <div class="flex justify-end pt-2 pr-4 ">
                                    <button x-on:click="
                                            isOpen = false
                                            youtube_link=''
                                    "
                                        class="text-3xl leading-none hover:text-gray-300 ">&times;</button>
                                </div>
                                <div class="px-4 py-4 modal-body">
                                    <div class="relative overflow-hidden responsive-container" style="padding-top: 56.25%">
                                        <iframe width="560" height="315"
                                            class="absolute top-0 left-0 w-full h-full responsive-iframe"
                                            x-bind:src=" youtube_link " style="border: 0;"
                                            allow=" autoplay;  encrypted-media;" allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>{{-- movie_info --}}
    <div class="border-b border-gray-800 cast pb-16">
        <div class="container px-4 pt-16 mx-auto ">
            <h2 class="text-lg font-semibold">Cast</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-9">
                @foreach ($movie['cast'] as $cast)
                    <div class="w-full mt-8 ">
                        <a href="{{route('actor.details',$cast['id'])}}">
                            <img src="{{ $cast['image_link'] }}" alt="avatar"
                                class="transition duration-150 ease-in-out hover:opacity-75">
                        </a>
                        <a href="#">
                            <h3 class="text-sm text-white">{{ $cast['name'] }}</h3>
                        </a>
                        <a href="#">
                            <h3 class="text-sm text-white">{{ $cast['character'] }}</h3>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>{{-- Cast --}}
    <div class="scenes" x-data="{isOpenModal:false,image:''}">
        <div class="border-b border-gray-800  pb-16">
            <div class="container px-4 pt-16 mx-auto ">
                <h2 class="text-lg font-semibold">Scenes</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-9">
                    @foreach ($movie['images'] as $scene)
                        <div class="w-full mt-8 ">
                            <a class="cursor-pointer "  @click="
                                   isOpenModal = true
                                   image = '{{ $scene['image_original_link'] }}'
                                ">
                                <img src="{{ $scene['image_link'] }}" alt="avatar"
                                    class="transition duration-150 ease-in-out hover:opacity-75">
                            </a>
                        </div>
                    @endforeach
                </div>
                <div x-show.transition.opacity="isOpenModal" style="background-color:rgba(0,0,0,0.5)"
                    class="fixed top-10 left-0 flex items-center pb-16 w-full h-full overflow-y-auto shadow-lg">
                    <div class="container mx-auto overflow-y-auto rounded-lg lg:px-24 ">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end pt-2 pr-4 ">
                                <button 
                                     @click= "isOpenModal = false"
                                     @keydown.escape.window=" isOpenModal = false"
                                     class="text-3xl leading-none hover:text-gray-300 ">&times;</button>
                            </div>
                            <div class="px-4 py-4 modal-body">
                                <img :src="image" alt="Poster">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>{{-- Scenes --}}
    </div>
@endsection
