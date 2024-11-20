@extends('layouts.main-layout')

@section('title', 'Atur Koin')

@section('content')

    <div class="flex w-full flex-col px-24">
        <form action={{ route('storeTopUp') }} method="POST" class="mx-auto w-full">
            @csrf
            <div class="mb-3">
                <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Jumlah Koin</label>
                <input type="number" id="coin_amount" name="coin_amount"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                    placeholder="Masukkan jumlah koin yang ingin dibeli..." value="{{ old('name') }}" />
            </div>
            <div class="mb-3">
                <label for="genre_id" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Metode
                    Pembayaran</label>
                <select id="payment_id" name="payment_id"
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                    <option value="" selected>Mohon pilih satu...</option>
                    @foreach ($payments as $payment)
                        <option value={{ $payment->id }}>{{ $payment->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                class="me-1 rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto">Isi
                Koin</button>
        </form>

        @if ($errors->any())
            <div class="mt-4 flex rounded-lg bg-red-50 p-4 text-sm text-red-800 dark:bg-gray-800 dark:text-red-400"
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
