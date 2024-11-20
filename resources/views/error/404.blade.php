@extends('layouts.main-layout')

@section('title', '404')

@section('content')
    <section class=dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl">
            <div class="mx-auto max-w-screen-sm text-center">
                <h1 class="text-primary-600 dark:text-primary-500 mb-4 text-7xl font-extrabold tracking-tight lg:text-9xl">
                    404</h1>
                <p class="mb-4 text-3xl font-bold tracking-tight text-gray-900 dark:text-white md:text-4xl">Tidak ketemu.</p>
                <p class="mb-8 text-lg font-light text-gray-500 dark:text-gray-400">Maaf, untuk page yang kamu cari tidak
                    ada.</p>
                <a href="{{ route('indexPage') }}"
                    class="dark:focus:ring-blue-80 rounded-lg bg-blue-700 px-5 py-4 text-lg font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700">Kembali
                    ke halaman utama</a>
            </div>
        </div>
    </section>
@endsection
