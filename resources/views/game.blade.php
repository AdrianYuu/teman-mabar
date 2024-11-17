@extends('layouts.main-layout')

@section('title', 'Daftar Game')

@section('content')
    <div class="flex flex-col w-1/2">
        <div class="bg-blue-50 w-1/6">
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full justify-between" type="button">{{ $selectedGenre ? $selectedGenre : 'Genre Permainan'}}
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
                
            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-48 dark:bg-gray-700">
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
        <div class="mt-4 grid grid-cols-4 gap-4">
            @foreach ($games as $game)
                <a href="">
                    <img class="rounded-lg w-full" src="{{ $game->game_picture_url }}" alt="{{ $game->name }}">
                </a>
            @endforeach
        </div>
    </div>
@endsection