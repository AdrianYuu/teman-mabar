@extends('layouts.admin-main-layout')

@section('title', 'Admin Dashboard | Edit Game')

@section('content')

    <form action={{ route('updateGame', ['id' => $game->id]) }} method="POST" class="max-w-8xl mx-auto mb-4"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Game Name</label>
            <input type="text" id="name" name="name"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                placeholder="Input new game name..." value="{{ $game->name }}" />
        </div>

        <div class="mb-3">
            <label for="genre_id" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Game Genre</label>
            <select id="genre_id" name="genre_id"
                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                <option value="{{ $game->genre_id }}" selected>{{ $game->gameGenre->name }}</option>
                @foreach ($gameGenres as $gameGenre)
                    <option value={{ $gameGenre->id }}>{{ $gameGenre->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="mb-2 block text-sm font-medium text-gray-900 dark:text-white" for="game_picture">Game
                Picture</label>
            <input
                class="block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                aria-describedby="file_input_help" id="game_picture" type="file" name="game_picture">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">JPG, PNG, or JPEG (MAX.
                2MB).
            </p>
        </div>

        <button type="submit"
            class="me-1 rounded-lg bg-yellow-400 px-5 py-2.5 text-sm font-medium text-white hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900">Edit</button>
        <button type="button" onclick="window.location.href='{{ route('gamePage') }}'"
            class="me-1 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Back</button>
    </form>

    @if ($errors->any())
        <div class="mb-4 mt-4 flex rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <svg class="me-3 mt-[2px] inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Danger</span>
            <div>
                <span class="font-medium">Ensure that these requirements are met:</span>
                <ul class="mt-1.5 list-inside list-disc">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

@endsection
