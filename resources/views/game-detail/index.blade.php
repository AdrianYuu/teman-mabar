@extends('layouts.main-layout')

@section('title', 'Game Detail Page')

@section('content')
    <div class="flex w-full flex-col gap-2 px-24">
        <div class="flex w-full gap-6">
            <div class="max-w-sm rounded-lg border border-gray-200 bg-white shadow dark:border-gray-700 dark:bg-gray-800">
                <a href="#">
                    <img class="rounded-t-lg" src="{{ $game->game_picture_url }}" alt="" />
                </a>
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $game->name }}
                        </h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $game->gameGenre->name }}</p>
                    <p>Price type: {{ $game->price_type }}</p>
                </div>
            </div>

            <div class="flex flex-wrap gap-4">
                @foreach ($game->userPriceDetails->filter(fn($userPriceDetail) => $userPriceDetail->user->id !== auth()->id()) as $userPriceDetail)
                    <div
                        class="h-72 w-52 max-w-sm rounded-lg border border-gray-200 shadow dark:border-gray-700 dark:bg-gray-800">
                        <a href="#">
                            <img class="rounded-t-lg" src="{{ $userPriceDetail->user->profile_picture_url }}"
                                alt="" />
                        </a>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $userPriceDetail->user->name }}</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Price:
                                {{ $userPriceDetail->price }}
                            </p>
                            <button data-modal-target="orderModal-{{ $userPriceDetail->user_id }}"
                                data-modal-toggle="orderModal-{{ $userPriceDetail->user_id }}"
                                class="inline-flex items-center rounded-lg bg-blue-700 px-3 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Order
                            </button>

                            <div id="orderModal-{{ $userPriceDetail->user_id }}" tabindex="-1" aria-hidden="true"
                                class="fixed left-0 right-0 top-0 z-50 hidden h-full w-full overflow-y-auto overflow-x-hidden bg-black bg-opacity-50">
                                <div class="relative mx-auto mt-24 w-full max-w-md">
                                    <div class="relative rounded-lg bg-white shadow dark:bg-gray-700">
                                        <form
                                            action="{{ route('storeOrder', ['game_id' => $game->id, 'gamer_user_id' => $userPriceDetail->user_id]) }}"
                                            method="POST" class="p-6">
                                            @csrf
                                            @if ($game->price_type === 'Match')
                                                <div class="mb-4">
                                                    <label for="total_match"
                                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                        Total Match</label>
                                                    <input type="number" id="total_match" name="total_match"
                                                        class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                        placeholder="Enter total matches..." required />
                                                </div>
                                            @endif
                                            <div class="mb-4">
                                                <label for="start_time"
                                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                    Start Time</label>
                                                <input type="datetime-local" id="start_time" name="start_time"
                                                    class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                    required />
                                            </div>
                                            <div class="mb-4">
                                                <label for="end_time"
                                                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                                                    End Time</label>
                                                <input type="datetime-local" id="end_time" name="end_time"
                                                    class="block w-full rounded-lg border border-gray-300 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                    required />
                                            </div>
                                            <div class="mt-4 flex justify-end">
                                                <button type="submit"
                                                    class="mr-2 rounded-lg bg-blue-700 px-3 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Confirm
                                                </button>
                                                <button type="button"
                                                    data-modal-toggle="orderModal-{{ $userPriceDetail->user_id }}"
                                                    class="rounded-lg bg-gray-200 px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-300 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                                    Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @if ($errors->any())
            <div class="mb-4 mt-4 flex rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
                role="alert">
                <svg class="me-3 mt-[2px] inline h-4 w-4 flex-shrink-0" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
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
    </div>

@endsection
