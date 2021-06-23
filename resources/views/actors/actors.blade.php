@extends('layout.app')

@section('content')
    <div class="container px-4 pt-16 mx-auto">
        <div class="popular_movies">
            <h2 class="text-lg font-semibold tracking-wider text-yellow-500 uppercase">Popular Actors</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-9">
                @foreach ($popActors as $actor)
                    <div class="actor w-full mt-8">
                        <a href="{{route('actor.details',$actor['id'])}}">
                            <img src="{{ $actor['image_link'] }}">
                        </a>
                        <a href="{{route('actor.details',$actor['id'])}}">
                            <h3 class="name text-lg font-semibold">{{ $actor['name'] }}</h3>
                        </a>
                        <div>
                            <h3 class="known_for truncate">{{ $actor['known_for'] }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="page-load-status">
            <div class="flex justify-center">
                <p class="infinite-scroll-request  spinner mt-8 text-4xl">&nbsp;</p>
            </div>
            <div class="flex justify-center">
                <p class="infinite-scroll-last mt-8">End of content</p>
            </div>
            <p class="infinite-scroll-error">No more pages to load</p>
            
        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        var elem = document.querySelector('.grid');
        var infScroll = new InfiniteScroll(elem, {
            // options
            path: '/actors/page/@{{#}}',
            append: '.actor',
            status: '.page-load-status'
            // history: false,
        });

    </script>
@endsection
