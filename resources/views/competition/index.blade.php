@extends('layouts.main-layout')

@section('title', 'Kompetisi')

@section('content')

    <div class="w-full pb-12">
        @if ($errors->any())
            <div class="mb-4 flex rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
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

        <div class="flex justify-end pe-24">
            <button type="button" onclick="window.location.href='{{ route('createCompetitionPage') }}'"
                class="mb-2 me-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Buat Kompetisi
            </button>
        </div>

        @if ($competitions->isEmpty())
            <p class="text-center">Belum ada kompetisi.</p>
        @else
            <div class="mt-8 flex w-full flex-col gap-12 px-24">
                @foreach ($competitions as $competition)
                    <?php
                    $isJoined = $competition->competitionMembers->contains('player_id', Auth::user()->id);
                    ?>
                    <div
                        class="min-w-96 flex rounded-lg border border-gray-200 bg-gradient-to-r from-gray-100 to-gray-50 shadow-lg transition-all duration-300 hover:scale-105 hover:shadow-2xl dark:border-gray-700 dark:bg-gray-800">
                        <div>
                            <img src="{{ $competition->game->game_picture_url }}" alt="" class="w-[30rem]">
                            <div class="bg-slate-50 p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $competition->name }}
                                    </h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $competition->description }}
                                </p>
                                <div class="space-y-2">
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <strong>Permainan:</strong> {{ $competition->game->name }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <strong>Hadiah Koin:</strong> <span
                                            class="font-medium text-green-600">{{ $competition->coin_prize }}</span>
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <strong>Koin Pendaftaran:</strong> {{ $competition->coin_registration }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <strong>Maksimum Tim:</strong> {{ $competition->maximum_team }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <strong>Tipe:</strong> {{ $competition->type }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <strong>Pendaftaran Dimulai:</strong>
                                        {{ \Carbon\Carbon::parse($competition->registration_start_time)->format('d M Y, H:i') }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <strong>Pendaftaran Berakhir:</strong>
                                        {{ \Carbon\Carbon::parse($competition->registration_end_time)->format('d M Y, H:i') }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <strong>Kompetisi Dimulai:</strong>
                                        {{ \Carbon\Carbon::parse($competition->competition_start_time)->format('d M Y, H:i') }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <strong>Kompetisi Berakhir:</strong>
                                        {{ \Carbon\Carbon::parse($competition->competition_end_time)->format('d M Y, H:i') }}
                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        <strong>Status:</strong> {{ $competition->status }}
                                    </p>
                                    @if ($isJoined)
                                        <div class="w-full max-w-[16rem]">
                                            <div class="relative">
                                                <label for="npm-install-copy-button" class="sr-only">Label</label>
                                                <input id="npm-install-copy-button" type="text"
                                                    class="col-span-6 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-500 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                                    value="{{ $competition->whatsapp_link_group }}" disabled readonly>
                                                <button data-copy-to-clipboard-target="npm-install-copy-button"
                                                    data-tooltip-target="tooltip-copy-npm-install-copy-button"
                                                    class="absolute end-2 top-1/2 inline-flex -translate-y-1/2 items-center justify-center rounded-lg p-2 text-gray-500 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800">
                                                    <span id="default-icon">
                                                        <svg class="h-3.5 w-3.5" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                            viewBox="0 0 18 20">
                                                            <path
                                                                d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z" />
                                                        </svg>
                                                    </span>
                                                    <span id="success-icon" class="inline-flex hidden items-center">
                                                        <svg class="h-3.5 w-3.5 text-blue-700 dark:text-blue-500"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 16 12">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M1 5.917 5.724 10.5 15 1.5" />
                                                        </svg>
                                                    </span>
                                                </button>
                                                <div id="tooltip-copy-npm-install-copy-button" role="tooltip"
                                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                                    <span id="default-tooltip-message">Copy to clipboard</span>
                                                    <span id="success-tooltip-message" class="hidden">Copied!</span>
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <div class="mt-2 flex">
                                    <form action="{{ route('joinCompetition', ['competition_id' => $competition->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="@if ($isJoined) bg-gray-400 cursor-not-allowed @else bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 @endif w-full items-center justify-center rounded-lg px-5 py-2.5 text-center text-sm font-medium text-white"
                                            @if ($isJoined) disabled @endif>
                                            @if ($isJoined)
                                                Sudah terdaftar
                                            @else
                                                Daftar
                                            @endif
                                        </button>
                                    </form>
                                </div>

                                <div class="mt-2 flex">
                                    <form action="{{ route('updateCompetition', ['competition_id' => $competition->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')

                                        @if ($competition->organizer_user_id === Auth::user()->id)
                                            @if ($competition->status === 'Belum Selesai')
                                                <button type="submit"
                                                    class="mb-2 me-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Selesaikan</button>
                                            @else
                                                <button type="button" disabled
                                                    class="mb-2 me-2 cursor-not-allowed rounded-lg bg-gray-400 px-5 py-2.5 text-sm font-medium text-white">Sudah
                                                    Selesai</button>
                                            @endif
                                        @endif
                                    </form>
                                </div>

                            </div>
                        </div>

                        <div class="w-full p-5">
                            @if (!$competition->competitionMembers->isEmpty())
                                <div class="relative overflow-x-auto">
                                    <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                                        <thead
                                            class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                                            <tr>
                                                <th scope="col" class="px-6 py-3">
                                                    Team Name
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($competition->competitionMembers as $competitionMember)
                                                <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                                                    <th scope="row"
                                                        class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                                        {{ $competitionMember->team_name }}
                                                    </th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p>Belum ada tim yang mendaftar.</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
