@extends('layout.app')

@section('content')
    <div class="mb-4 border-b border-gray-800 actor-details">
        <div class="container flex flex-col px-4 py-16 mx-auto md:flex-row">
            <div class="flex flex-col">
                <div class="w-64">
                    <img class="w-full" src="{{ $actor['image_link'] }}" alt="avatar">
                </div>
                <div class="flex flex-row mt-4">
                    @if ($social['facebook_id'])
                         <a href="{{$social['facebook_id']}}"> 
                          <svg aria-hidden="true" focusable="false" data-prefix="fab"
                                data-icon="facebook-square" class="w-4"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                             <path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z">
                             </path>
                           </svg>
                         </a>
                    @endif
                    @if ($social['twitter_id'])
                         <a href="{{$social['twitter_id']}}" class="ml-1">   
                          <svg aria-hidden="true" focusable="false" data-prefix="fab"
                             data-icon="twitter-square" class="w-4"
                             role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                             <path fill="currentColor" d="M400 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm-48.9 158.8c.2 2.8.2 5.7.2 8.5 0 86.7-66 186.6-186.6 186.6-37.2 0-71.7-10.8-100.7-29.4 5.3.6 10.4.8 15.8.8 30.7 0 58.9-10.4 81.4-28-28.8-.6-53-19.5-61.3-45.5 10.1 1.5 19.2 1.5 29.6-1.2-30-6.1-52.5-32.5-52.5-64.4v-.8c8.7 4.9 18.9 7.9 29.6 8.3a65.447 65.447 0 0 1-29.2-54.6c0-12.2 3.2-23.4 8.9-33.1 32.3 39.8 80.8 65.8 135.2 68.6-9.3-44.5 24-80.6 64-80.6 18.9 0 35.9 7.9 47.9 20.7 14.8-2.8 29-8.3 41.6-15.8-4.9 15.2-15.2 28-28.8 36.1 13.2-1.4 26-5.1 37.8-10.2-8.9 13.1-20.1 24.7-32.9 34z">
                             </path>
                          </svg>
                         </a>
                    @endif
                    @if ($social['instagram_id'])
                         <a href="{{$social['instagram_id']}}" class="ml-1">                
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" 
                                data-icon="instagram" class="w-4"
                                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                               <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                               </path>
                            </svg>
                         </a>
                    @endif
                    @if ($actor['homepage'])
                         <a href="{{$actor['homepage']}}" class='ml-1'>
                            <svg aria-hidden="true" focusable="false" data-prefix="fas"
                            data-icon="globe" class="w-4"
                            role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
                            <path fill="currentColor" d="M336.5 160C322 70.7 287.8 8 248 8s-74 62.7-88.5 152h177zM152 256c0 22.2 1.2 43.5 3.3 64h185.3c2.1-20.5 3.3-41.8 3.3-64s-1.2-43.5-3.3-64H155.3c-2.1 20.5-3.3 41.8-3.3 64zm324.7-96c-28.6-67.9-86.5-120.4-158-141.6 24.4 33.8 41.2 84.7 50 141.6h108zM177.2 18.4C105.8 39.6 47.8 92.1 19.3 160h108c8.7-56.9 25.5-107.8 49.9-141.6zM487.4 192H372.7c2.1 21 3.3 42.5 3.3 64s-1.2 43-3.3 64h114.6c5.5-20.5 8.6-41.8 8.6-64s-3.1-43.5-8.5-64zM120 256c0-21.5 1.2-43 3.3-64H8.6C3.2 212.5 0 233.8 0 256s3.2 43.5 8.6 64h114.6c-2-21-3.2-42.5-3.2-64zm39.5 96c14.5 89.3 48.7 152 88.5 152s74-62.7 88.5-152h-177zm159.3 141.6c71.4-21.2 129.4-73.7 158-141.6h-108c-8.8 56.9-25.6 107.8-50 141.6zM19.3 352c28.6 67.9 86.5 120.4 158 141.6-24.4-33.8-41.2-84.7-50-141.6h-108z">
                            </path>
                            </svg>
                         </a>
                    @endif
                </div>
                
            </div>
            <div class="flex flex-col md:ml-24 pb-8">
                <h2 class="text-4xl font-semibold ">{{ $actor['name'] }}</h2>
                <div class="flex items-center mt-2 text-sm text-gray-500">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="birthday-cake"
                        class="w-4" role="img" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 448 512">
                        <path fill="currentColor"
                            d="M448 384c-28.02 0-31.26-32-74.5-32-43.43 0-46.825 32-74.75 32-27.695 0-31.454-32-74.75-32-42.842 0-47.218 32-74.5 32-28.148 0-31.202-32-74.75-32-43.547 0-46.653 32-74.75 32v-80c0-26.5 21.5-48 48-48h16V112h64v144h64V112h64v144h64V112h64v144h16c26.5 0 48 21.5 48 48v80zm0 128H0v-96c43.356 0 46.767-32 74.75-32 27.951 0 31.253 32 74.75 32 42.843 0 47.217-32 74.5-32 28.148 0 31.201 32 74.75 32 43.357 0 46.767-32 74.75-32 27.488 0 31.252 32 74.5 32v96zM96 96c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40zm128 0c-17.75 0-32-14.25-32-32 0-31 32-23 32-64 12 0 32 29.5 32 56s-14.25 40-32 40z">
                        </path>
                    </svg>
                    <h5 class="ml-1">{{$actor['birthday']}} {{'('.$actor['age'].') years old in'}}{{$actor['place_of_birth']}}</h5>
                </div>
                <div class="mt-8 w-full text-sm biography">
                    <p>
                        {{$actor['biography']}}
                    </p>
                </div>
                <div class="known_for mt-8">
                    <h3 class="text-2xl font-semibold mb-4">Known For</h3>
                    <div class=" grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-9">
                        @foreach ($knownForMovies as $movie)    
                          <div>
                              <a href="{{route('movie.info',$movie['id'])}}">
                                <img class="w-full" src="{{$movie['poster_link']}}" alt="{{$movie['title']}}" ">
                                <h3 class="font-semibold">{{$movie['title']}}</h3>
                              </a>
                          </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4 border-b border-gray-800 actor-details">
        <div class="container flex flex-col px-4 py-16 mx-auto">
            <div>
                <h3 class="text-2xl font-semibold">Acting</h3>
                <table>
                    <tr>
                        <td>
                            <table class="credit_group">
                                <tr>
                                  <td class="year">&mdash;</td>
                                    <td class="seperator"><span class="glyphicons_v2 circle-empty account_adult_false item_adult_false"></span></td>
                                    <td class="role false account_adult_false item_adult_false">
                                      <a class="tooltip" href="/movie/721340"><bdi>A Few Good Men</bdi></a>
                                        <span class="group"> as <span class="character">Lt. Daniel Kaffee</span></span>
                                    </td>
                                </tr> 
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
