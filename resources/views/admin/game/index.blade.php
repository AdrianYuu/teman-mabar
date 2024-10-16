@extends('layouts.admin-main-layout')

@section('title', 'Admin Dashboard | Game')

@section('content')

    @if (session('success'))
        <div class="mb-4 flex items-center rounded-lg bg-green-50 p-4 text-sm text-green-800 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <svg class="me-3 inline h-4 w-4 flex-shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="relative overflow-x-auto">
        <div class="mb-2 flex justify-end">
            <button type="button" onclick="window.location.href='{{ route('createGamePage') }}'""
                class="mb-2 me-2 cursor-pointer rounded-lg bg-blue-700 px-5 py-2.5 text-xl font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">+
            </button>
        </div>

        @if ($games->isEmpty())
            <p class="mt-2 text-center">There is no game yet!</p>
        @else
            <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="w-1/4 px-6 py-3 text-left">
                            Game Name
                        </th>
                        <th scope="col" class="w-1/4 px-6 py-3 text-left">
                            Genre Name
                        </th>
                        <th scope="col" class="w-1/4 px-6 py-3 text-left">
                            Game Image
                        </th>
                        <th scope="col" class="w-1/4 px-6 py-3 text-left">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $game)
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                                {{ $game->name }}
                            </th>
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                                {{ $game->gameGenre->name }}
                            </th>
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                                <img src="{{ $game->game_picture_url }}" alt="game_picture" class="w-24">
                            </th>
                            <td class="flex px-6 py-4">
                                <button type="button"
                                    onclick="window.location.href='{{ route('editGamePage', ['id' => $game->id]) }}'"
                                    class="mb-2 me-2 rounded-lg bg-yellow-400 px-5 py-2.5 text-sm font-medium text-white hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900">Edit</button>
                                <button type="button"
                                    onclick="window.location.href='{{ route('deleteGamePage', ['id' => $game->id]) }}'""
                                    class="mb-2 me-2 rounded-lg bg-red-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{ $games->links('vendor.pagination.tailwind-custom') }}

    </div>
@endsection
