@extends('layouts.admin-main-layout')

@section('title', 'Admin Dashboard | Delete Game Genre')

@section('content')

    <form action={{ route('destroyGameGenre', ['id' => $gameGenre->id]) }} method="POST" class="max-w-8xl mx-auto mb-4">
        @method('DELETE')
        @csrf
        <div class="mb-3">
            <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Genre Name</label>
            <input type="text" id="name" name="name"
                class="block w-full cursor-not-allowed rounded-lg border border-gray-300 bg-gray-100 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                disabled readonly placeholder="Input new genre name..." value="{{ $gameGenre->name }}" />
        </div>
        <button type="submit" id="disabled-input-2"
            class="mb-2 me-1 rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
        <button type="button" onclick="window.location.href='{{ route('gameGenrePage') }}'"
            class="mb-2 me-1 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Back</button>
    </form>

@endsection
