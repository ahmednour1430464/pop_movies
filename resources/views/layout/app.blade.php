<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <title>Movies App</title>
</head>

<body class="font-sans text-white bg-gray-900">
    <nav class="sticky top-0 z-10 bg-gray-900 border-b border-gray-800 ">
        <div class="container flex flex-col items-center justify-between px-4 py-4 mx-auto md:flex-row">
            <ul class="flex flex-col items-center md:flex-row">
                <li>
                    <a href="{{ route('movies') }}">

                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="film" class="w-10"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor"
                                d="M488 64h-8v20c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12V64H96v20c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12V64h-8C10.7 64 0 74.7 0 88v336c0 13.3 10.7 24 24 24h8v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h320v-20c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v20h8c13.3 0 24-10.7 24-24V88c0-13.3-10.7-24-24-24zM96 372c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12H44c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm272 208c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm0-168c0 6.6-5.4 12-12 12H156c-6.6 0-12-5.4-12-12v-96c0-6.6 5.4-12 12-12h200c6.6 0 12 5.4 12 12v96zm112 152c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40zm0-96c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40z">
                            </path>
                        </svg>
                    </a>
                </li>
                <li class="mt-3 md:ml-16 md:mt-0">
                    <a href="{{route('movies')}}" class="hover:text-gray-600 ">Movies</a>
                </li>
                <li class="mt-3 md:ml-6 md:mt-0">
                    <a href="#" class="hover:text-gray-600 ">Tv Shows</a>
                </li>
                <li class="mt-3 md:ml-6 md:mt-0">
                    <a href="{{route('actors')}}" class="hover:text-gray-600 ">Actors</a>
                </li>
            </ul>
            <div class="flex flex-col items-center md:flex-row">
                <livewire:search-dropdown  />
                <div class="mt-3 md:ml-4 md:mt-0">
                    <a href="#">
                        <img src="/img/avatar.jpg" alt="avatar" class="w-8 h-8 rounded-full">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    @livewireScripts
    @yield('scripts')
</body>

</html>
