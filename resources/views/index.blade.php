@extends('layouts.main-layout')

@section('title', 'Halaman Utama')

@section('content')
    <div class="flex w-4/5 flex-col items-center">
        {{-- Tournament Poster Carousel --}}
        <div id="default-carousel" class="relative w-3/4" data-carousel="slide">
            <div class="relative overflow-hidden rounded-lg md:h-96">
                @foreach ($games as $game)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <a href="{{ route('gameDetailPage', ['name' => $game->name]) }}">
                            <img src={{ $game->game_picture_url }}
                                class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                                alt="...">
                        </a>
                    </div>
                @endforeach
            </div>
            <button type="button"
                class="group absolute start-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-1 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                    <svg class="h-4 w-4 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="group absolute end-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-1 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                    <svg class="h-4 w-4 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

        {{--  --}}
        <div class="mx-24 mt-12">
            <p class="mb-3 text-gray-500 dark:text-gray-400">TemanMabar adalah sebuah platform inovatif berbasis web yang
                dirancang untuk membantu gamer menemukan teman
                bermain yang seru dan cocok dengan preferensi mereka. Dengan fitur pencarian yang canggih dan rekomendasi
                berbasis minat, pengguna dapat dengan mudah menemukan teman mabar untuk berbagai jenis permainan, baik itu
                game kompetitif, kasual, maupun kooperatif.</p>
            <p class="text-gray-500 dark:text-gray-400">Selain itu, TemanMabar menyediakan ruang komunitas di mana pengguna
                dapat berbagi pengalaman, berdiskusi strategi, dan menjalin relasi dengan gamer lain. Platform ini
                mengutamakan kemudahan penggunaan, keamanan, dan kenyamanan sehingga menjadi pilihan utama bagi mereka yang
                ingin memperluas jaringan gaming mereka sambil menikmati pengalaman bermain yang lebih menyenangkan.</p>
        </div>

        {{-- Genre Game --}}
        <div class="mt-8 w-5/6">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="-mb-px flex flex-wrap text-center text-sm font-medium" id="default-tab"
                    data-tabs-toggle="#default-tab-content" role="tablist">
                    @foreach ($genres as $genre)
                        <li class="me-auto" role="presentation">
                            <button class="inline-block rounded-t-lg border-b-2 p-4" id="{{ strtolower($genre->name) }}-tab"
                                data-tabs-target="#{{ strtolower($genre->name) }}" type="button" role="tab"
                                aria-controls="{{ strtolower($genre->name) }}"
                                aria-selected="false">{{ $genre->name }}</button>
                        </li>
                    @endforeach
                    <li>
                        <a href="{{ route('gameListPage') }}"
                            class="inline-block rounded-t-lg p-4 text-blue-500 hover:border-b-2">Lainnya...</a>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                @foreach ($genres as $genre)
                    <div class="no-scrollbar flex gap-4 overflow-x-auto rounded-lg bg-gray-50 p-2 dark:bg-gray-800"
                        id="{{ strtolower($genre->name) }}" role="tabpanel"
                        aria-labelledby="{{ strtolower($genre->name) }}-tab">
                        @foreach ($genre->games as $game)
                            <a href="{{ route('gameDetailPage', ['name' => $game->name]) }}"
                                class="flex h-72 w-64 flex-shrink-0 flex-col items-center rounded-2xl border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 md:max-w-xl md:flex-row">
                                <img class="h-full w-full rounded-2xl object-cover" src={{ $game->game_picture_url }}
                                    alt="">
                            </a>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        {{--  --}}
        <video class="mt-8 w-full" autoplay controls>
            <source src="https://drive.google.com/uc?export=download&id=1vc4EOzPMOnpDE8_C6iZZkmvyCMZJ1P" type='video/mp4'>
            Your browser does not support the video tag.
        </video>

        {{--  --}}
        <div class="mx-28 mt-24">
            <blockquote class="text-xl font-semibold italic text-gray-900 dark:text-white">
                <svg class="mb-4 h-8 w-8 text-gray-400 dark:text-gray-600" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 14">
                    <path
                        d="M6 0H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3H2a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Zm10 0h-4a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h4v1a3 3 0 0 1-3 3h-1a1 1 0 0 0 0 2h1a5.006 5.006 0 0 0 5-5V2a2 2 0 0 0-2-2Z" />
                </svg>
                <p>"Game lebih seru ketika dimainkan bersama teman."</p>
            </blockquote>
        </div>

        {{-- Top Player --}}
        <div id="indicators-carousel" class="relative mt-12 w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                @foreach ($users as $user)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                        <a href="{{ route('playerDetailPage', ['id' => $user->id]) }}"> <img
                                src={{ $user->profile_picture_url ?? asset('assets/images/Profile-banner.jpg') }}
                                class="absolute left-1/2 top-1/2 block w-full -translate-x-1/2 -translate-y-1/2"
                                alt="..."></a>
                    </div>
                @endforeach
            </div>
            <!-- Slider indicators -->
            <div class="absolute bottom-5 left-1/2 z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="h-3 w-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="h-3 w-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="h-3 w-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
                <button type="button" class="h-3 w-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="3"></button>
                <button type="button" class="h-3 w-3 rounded-full" aria-current="false" aria-label="Slide 5"
                    data-carousel-slide-to="4"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="group absolute start-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                    <svg class="h-4 w-4 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="group absolute end-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                    <svg class="h-4 w-4 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>

    </div>
@endsection
