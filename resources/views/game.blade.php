@extends('layouts.main-layout')

@section('title', 'Daftar Game')

@section('content')
    <div class="flex flex-col w-1/2">
        <div class="w-auto">
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-auto justify-between" type="button">{{ $selectedGenre ? $selectedGenre : 'Genre Permainan'}}
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    @foreach ($genres as $genre)
                        <li>
                            <a href="{{ route('gameListPage', ['genre'=>$genre->name]) }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $genre->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        {{-- Image Section --}}
        @if ($games->isEmpty())
            <div id="toast-warning" class="flex justify-center items-center w-1/2 max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 m-auto" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                    </svg>
                    <span class="sr-only">Warning icon</span>
                </div>
                <div class="ms-3 text-sm font-normal">Daftar permainan belum ditambahkan.</div>
            </div>
        @else
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                @foreach ($games as $game)
                    <a href="{{ route('gameDetailPage', ['name' => $game->name]) }}" class="group relative block rounded-lg overflow-hidden">
                        <img class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-1000" 
                            src="{{ $game->game_picture_url }}" 
                            alt="{{ $game->name ?? 'Game Image' }}">
                        <div class="absolute inset-0 bg-black opacity-35 group-hover:opacity-0 transition-opacity duration-300"></div>
                        <p class="absolute bottom-2 left-2 text-gray-200 text-lg font-bold">{{ $game->name }}</p>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
@endsection