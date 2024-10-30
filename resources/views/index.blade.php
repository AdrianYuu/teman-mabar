@extends('layouts.main-layout')

@section('title', 'Index')

@section('content')
    <div class="flex flex-col w-1/2 items-center">
        {{-- Tournament Poster Carousel --}}
        <div id="default-carousel" class="relative w-3/4" data-carousel="slide">
            <div class="relative overflow-hidden rounded-lg md:h-96">
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="">
                        <img src={{ asset('assets/images/profile-picture.jpg') }} class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="">
                        <img src={{ asset('assets/images/profile-picture.jpg') }} class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="">
                        <img src={{ asset('assets/images/profile-picture.jpg') }} class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="">
                        <img src={{ asset('assets/images/profile-picture.jpg') }} class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
                {{-- Item 5 --}}
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <a href="">
                        <img src={{ asset('assets/images/profile-picture.jpg') }} class="absolute block w-full h-full object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </a>
                </div>
            </div>
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-1 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-1 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
        {{-- Genre Game --}}
        <div class="w-full mt-8">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    @foreach ($genres as $genre)
                        <li class="me-auto" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="{{ strtolower($genre->name) }}-tab" data-tabs-target="#{{ strtolower($genre->name) }}" type="button" role="tab" aria-controls="{{ strtolower($genre->name) }}" aria-selected="false">{{ $genre->name }}</button>
                        </li>
                    @endforeach
                    <li>
                        <a href="{{ route('gameListPage') }}" class="inline-block p-4 rounded-t-lg text-blue-500 hover:border-b-2">Lainnya...</a>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                @foreach ($genres as $genre)
                    <div class="rounded-lg bg-gray-50 dark:bg-gray-800 flex gap-4 overflow-x-auto no-scrollbar p-2" id="{{ strtolower($genre->name) }}" role="tabpanel" aria-labelledby="{{ strtolower($genre->name) }}-tab">
                        @foreach ($genre->games as $game)
                            <a href="{{ route('competitionPage', ['name'=>$game->name]) }}" class="flex flex-col items-center border border-gray-200 md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 h-64 w-48 rounded-2xl flex-shrink-0">
                                <img class="w-full h-full rounded-2xl" src="{{ asset('assets/images/profile-picture.jpg') }}" alt="">
                            </a>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        {{-- Top Player --}}
        <div id="default-carousel" class="relative w-full h-[11.32rem]" data-carousel="static">
            <div class="relative overflow-hidden rounded-lg h-auto min-h-[200px]">
                <!-- Section 1 -->
                <div class="hidden duration-700 ease-in-out h-full" data-carousel-item>
                    <div class="grid grid-cols-2 gap-4 h-full">
                        <a href="#" class="flex flex-col items-center bg-gray-50 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full h-3/4 p-2 gap-2">
                            <img class="w-1/3 h-full rounded-md" src={{ asset('assets/images/profile-picture.jpg') }} alt="">
                            <div class="flex flex-col justify-between leading-normal">
                                <h5 class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Test Test test</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Test</p>
                            </div>
                        </a>
                        <a href="#" class="flex flex-col items-center bg-gray-50 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full h-3/4 p-2 gap-2">
                            <img class="w-1/3 h-full rounded-md" src={{ asset('assets/images/profile-picture.jpg') }} alt="">
                            <div class="flex flex-col justify-between leading-normal">
                                <h5 class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Test Test test</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Test</p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Section 2 -->
                <div class="hidden duration-700 ease-in-out h-full" data-carousel-item>
                    <div class="grid grid-cols-2 gap-4 h-full">
                        <a href="#" class="flex flex-col items-center bg-gray-50 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full h-3/4 p-2 gap-2">
                            <img class="w-1/3 h-full rounded-md" src={{ asset('assets/images/profile-picture.jpg') }} alt="">
                            <div class="flex flex-col justify-between leading-normal">
                                <h5 class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Test Test test</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Test</p>
                            </div>
                        </a>
                        <a href="#" class="flex flex-col items-center bg-gray-50 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full h-3/4 p-2 gap-2">
                            <img class="w-1/3 h-full rounded-md" src={{ asset('assets/images/profile-picture.jpg') }} alt="">
                            <div class="flex flex-col justify-between leading-normal">
                                <h5 class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Test Test test</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Test</p>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- Section 3 -->
                <div class="hidden duration-700 ease-in-out h-full" data-carousel-item>
                    <div class="grid grid-cols-2 gap-4 h-full">
                        <a href="#" class="flex flex-col items-center bg-gray-50 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full h-3/4 p-2 gap-2">
                            <img class="w-1/3 h-full rounded-md" src={{ asset('assets/images/profile-picture.jpg') }} alt="">
                            <div class="flex flex-col justify-between leading-normal">
                                <h5 class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Test Test test</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Test</p>
                            </div>
                        </a>
                        <a href="#" class="flex flex-col items-center bg-gray-50 border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full h-3/4 p-2 gap-2">
                            <img class="w-1/3 h-full rounded-md" src={{ asset('assets/images/profile-picture.jpg') }} alt="">
                            <div class="flex flex-col justify-between leading-normal">
                                <h5 class="mb-2 text-md font-bold tracking-tight text-gray-900 dark:text-white">Test Test test</h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Test</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Previous button -->
            <button type="button" class="absolute top-1/2 -left-8 transform -translate-y-1/2 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-400 dark:bg-gray-800/30 group-hover:bg-gray-500 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                    <svg class="w-4 h-4 text-gray-100 dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <!-- Next button -->
            <button type="button" class="absolute top-1/2 -right-8 transform -translate-y-1/2 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-gray-400 dark:bg-gray-800/30 group-hover:bg-gray-500 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                    <svg class="w-4 h-4 text-gray-100 dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>
@endsection