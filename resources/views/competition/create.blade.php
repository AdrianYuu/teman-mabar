@extends('layouts.main-layout')

@section('title', 'Buat Kompetisi')

@section('content')

    <div class="max-w-8xl mx-24 flex w-full flex-col">
        <form action={{ route('storeCompetition') }} method="POST" class="">
            @csrf
            <div class="mb-3">
                <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama
                    Kompetisi</label>
                <input type="text" id="name" name="name"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Masukkan nama kompetisi..." value="{{ old('name') }}" />
            </div>

            <div class="mb-3">
                <label for="description" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Deskripsi
                    Kompetisi</label>
                <input type="text" id="description" name="description"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Masukkan deskripsi kompetisi..." value="{{ old('description') }}" />
            </div>

            <div class="mb-3">
                <label for="game_id" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Permainan</label>
                <select id="game_id" name="game_id"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    <option value="" selected>Pilih satu permainan...</option>
                    @foreach ($games as $game)
                        <option value={{ $game->id }}>{{ $game->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="type" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tipe
                    Permainan</label>
                <select id="type" name="type"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    <option value="" selected>Pilih satu tipe...</option>
                    <option value="Solo">Solo</option>
                    <option value="Team">Team</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="coin_prize" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Koin Hadiah
                </label>
                <input type="number" id="coin_prize" name="coin_prize"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Masukkan koin hadiah kompetisi..." value="{{ old('coin_prize') }}" />
            </div>

            <div class="mb-3">
                <label for="coin_register" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Koin
                    Pendaftaran
                </label>
                <input type="number" id="coin_register" name="coin_register"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Masukkan koin pendaftaran kompetisi..." value="{{ old('coin_register') }}" />
            </div>

            <div class="mb-3">
                <label for="team_count" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Jumlah Tim
                </label>
                <input type="number" id="team_count" name="team_count"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Masukkan jumlah tim kompetisi..." value="{{ old('team_count') }}" />
            </div>

            <div class="mb-3">
                <label for="register_start_date"
                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Mulai
                    Registrasi
                </label>
                <input type="datetime-local" id="register_start_date" name="register_start_date"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="" value="{{ old('register_start_date') }}" />
            </div>

            <div class="mb-3">
                <label for="register_finish_date"
                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Selesai
                    Registrasi
                </label>
                <input type="datetime-local" id="register_finish_date" name="register_finish_date"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder=" value="{{ old('register_finish_date') }}" />
            </div>

            <div class="mb-3">
                <label for="competition_start_date"
                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal
                    Mulai
                    Kompetisi
                </label>
                <input type="datetime-local" id="competition_start_date" name="competition_start_date"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="" value="{{ old('competition_start_date') }}" />
            </div>


            <div class="mb-3">
                <label for="competition_finish_date"
                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal Selesai
                    Kompetisi
                </label>
                <input type="datetime-local" id="competition_finish_date" name="competition_finish_date"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="" value="{{ old('competition_finish_date') }}" />
            </div>
            <div class="mb-3">
                <label for="whatsapp" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Link Grup
                    Whatsapp
                </label>
                <input type="text" id="whatsapp" name="whatsapp"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Masukkan link grup whatsapp..." value="{{ old('whatsapp') }}" />
            </div>
            <button type="submit"
                class="me-1 rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Buat</button>
            <button type="button" onclick="window.location.href='{{ route('competitionPage') }}'"
                class="me-1 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Kembali</button>
        </form>

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
