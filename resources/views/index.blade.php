@extends('layouts.main-layout')

@section('title', 'Index')

@section('content')
    <div class="flex w-1/2 flex-col items-center">
        {{-- Tournament Poster Carousel --}}
        <div id="default-carousel" class="relative w-3/4" data-carousel="slide">
            <div class="relative overflow-hidden rounded-lg md:h-96">
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="">
                        <img src={{ asset('assets/images/profile-picture.jpg') }}
                            class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                            alt="...">
                    </a>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="">
                        <img src={{ asset('assets/images/profile-picture.jpg') }}
                            class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                            alt="...">
                    </a>
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="">
                        <img src={{ asset('assets/images/profile-picture.jpg') }}
                            class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                            alt="...">
                    </a>
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="">
                        <img src={{ asset('assets/images/profile-picture.jpg') }}
                            class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                            alt="...">
                    </a>
                </div>
                {{-- Item 5 --}}
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="">
                        <img src={{ asset('assets/images/profile-picture.jpg') }}
                            class="absolute left-1/2 top-1/2 block h-full w-full -translate-x-1/2 -translate-y-1/2 object-cover"
                            alt="...">
                    </a>
                </div>
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
        {{-- Genre Game --}}
        <div class="mt-8 w-full">
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
                        {{-- <a href="{{ route('') }}"
                            class="inline-block rounded-t-lg p-4 text-blue-500 hover:border-b-2">Lainnya...</a> --}}
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
                                class="flex h-64 w-48 flex-shrink-0 flex-col items-center rounded-2xl border border-gray-200 hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 md:max-w-xl md:flex-row">
                                <img class="h-full w-full rounded-2xl"
                                    src="{{ asset('assets/images/profile-picture.jpg') }}" alt="">
                            </a>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>


        {{-- Top Player --}}
        {{-- <div id="default-carousel" class="relative h-[11.32rem] w-full" data-carousel="static">
            <div class="relative h-auto min-h-[200px] overflow-hidden rounded-lg">
                <!-- Section 1 -->
                <div class="hidden h-full duration-700 ease-in-out" data-carousel-item>
                    <div class="grid h-full grid-cols-2 gap-4">
                        <a href="#"
                            class="flex h-3/4 w-full flex-col items-center gap-2 rounded-lg border border-gray-200 bg-gray-50 p-2 shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 md:max-w-xl md:flex-row">
                            <img class="h-full w-1/3 rounded-md" src={{ asset('assets/images/profile-picture.jpg') }}
                                alt="">
                            <div class="flex flex-col justify-between leading-normal">
                                <h5 class="text-md mb-2 font-bold tracking-tight text-gray-900 dark:text-white">Test Test
                                    test</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Test</p>
                            </div>
                        </a>
                        <a href="#"
                            class="flex h-3/4 w-full flex-col items-center gap-2 rounded-lg border border-gray-200 bg-gray-50 p-2 shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 md:max-w-xl md:flex-row">
                            <img class="h-full w-1/3 rounded-md" src={{ asset('assets/images/profile-picture.jpg') }}
                                alt="">
                            <div class="flex flex-col justify-between leading-normal">
                                <h5 class="text-md mb-2 font-bold tracking-tight text-gray-900 dark:text-white">Test Test
                                    test</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Test</p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Section 2 -->
                <div class="hidden h-full duration-700 ease-in-out" data-carousel-item>
                    <div class="grid h-full grid-cols-2 gap-4">
                        <a href="#"
                            class="flex h-3/4 w-full flex-col items-center gap-2 rounded-lg border border-gray-200 bg-gray-50 p-2 shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 md:max-w-xl md:flex-row">
                            <img class="h-full w-1/3 rounded-md" src={{ asset('assets/images/profile-picture.jpg') }}
                                alt="">
                            <div class="flex flex-col justify-between leading-normal">
                                <h5 class="text-md mb-2 font-bold tracking-tight text-gray-900 dark:text-white">Test Test
                                    test</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Test</p>
                            </div>
                        </a>
                        <a href="#"
                            class="flex h-3/4 w-full flex-col items-center gap-2 rounded-lg border border-gray-200 bg-gray-50 p-2 shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 md:max-w-xl md:flex-row">
                            <img class="h-full w-1/3 rounded-md" src={{ asset('assets/images/profile-picture.jpg') }}
                                alt="">
                            <div class="flex flex-col justify-between leading-normal">
                                <h5 class="text-md mb-2 font-bold tracking-tight text-gray-900 dark:text-white">Test Test
                                    test</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Test</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Section 3 -->
                <div class="hidden h-full duration-700 ease-in-out" data-carousel-item>
                    <div class="grid h-full grid-cols-2 gap-4">
                        <a href="#"
                            class="flex h-3/4 w-full flex-col items-center gap-2 rounded-lg border border-gray-200 bg-gray-50 p-2 shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 md:max-w-xl md:flex-row">
                            <img class="h-full w-1/3 rounded-md" src={{ asset('assets/images/profile-picture.jpg') }}
                                alt="">
                            <div class="flex flex-col justify-between leading-normal">
                                <h5 class="text-md mb-2 font-bold tracking-tight text-gray-900 dark:text-white">Test Test
                                    test</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Test</p>
                            </div>
                        </a>
                        <a href="#"
                            class="flex h-3/4 w-full flex-col items-center gap-2 rounded-lg border border-gray-200 bg-gray-50 p-2 shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 md:max-w-xl md:flex-row">
                            <img class="h-full w-1/3 rounded-md" src={{ asset('assets/images/profile-picture.jpg') }}
                                alt="">
                            <div class="flex flex-col justify-between leading-normal">
                                <h5 class="text-md mb-2 font-bold tracking-tight text-gray-900 dark:text-white">Test Test
                                    test</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Test</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Previous button -->
            <button type="button"
                class="group absolute -left-8 top-1/2 z-30 flex h-full -translate-y-1/2 transform cursor-pointer items-center justify-center px-4 focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-gray-400 group-hover:bg-gray-500 dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                    <svg class="h-4 w-4 text-gray-100 rtl:rotate-180 dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <!-- Next button -->
            <button type="button"
                class="group absolute -right-8 top-1/2 z-30 flex h-full -translate-y-1/2 transform cursor-pointer items-center justify-center px-4 focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-gray-400 group-hover:bg-gray-500 dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                    <svg class="h-4 w-4 text-gray-100 rtl:rotate-180 dark:text-gray-800" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div> --}}
    </div>
@endsection
