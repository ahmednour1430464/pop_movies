<div class="relative mt-3 md:mt-0"
    x-data="{isOpen:true}"
    @click.away="isOpen = false">
    <input 
        wire:model.debounce.500ms='search'
        x-on:keydown.escape.window="isOpen = false"
        x-on:focus="isOpen = true" 
        x-ref="search"
        x-on:keydown.window="
           if(event.keyCode == 191){
               event.preventDefault();
               $refs.search.focus();
           }
        "
        type="text"placeholder="Search"
        class="w-64 px-4 py-1 pl-8 text-sm bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-400">
    <div class="absolute top-0">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search"
            class="w-4 mt-2 ml-2 text-gray-400" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor"
                d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
            </path>
        </svg>
    </div>
    <div wire:loading class="top-0 right-0 mt-3 mr-4 spinner"></div>
    <div class='absolute w-64 mt-4 text-sm bg-gray-800 rounded' x-show.transition.opacity="isOpen">
        <ul>
            @if (count($searchResults) >= 1)
                @foreach ($searchResults as $result)

                    @continue(!$result['poster_path'])
                    

                    <li class="border-b border-gray-700" >
                        <div class="flex hover:bg-gray-700" >
                            <img src="{{ config('services.tmdb.api_img_url').'/w500'. $result['poster_path'] }}" class="w-8"
                                alt="">
                            <a 
                                href="{{ route('movie.info', $result['id']) }}"
                                class="w-full px-3 py-3"
                                >
                                {{ collect($result['original_title'])->take(15)->implode(" ") }}
                            </a>
                                
                        </div>
                    </li>

                @endforeach
            @else
                @if (!$search == '')
                    <li class="block px-3 py-3 border-b border-gray-700">Something incorrect in {{ $search }}</li>
                @endif
            @endif
        </ul>
    </div>
</div>
