@extends('layouts.main-layout')

@section('title', 'Profil')

@section('content')
    <div class="flex w-1/2 gap-12">
        {{-- Left Side --}}
        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow p-4">
            <img class="rounded-t-lg" src="{{ asset('assets/images/profile-picture.jpg') }}" alt="" />
            <form action="" method="POST" class="mt-6 w-full" enctype="multipart/form-data">
                @csrf
                <label for="file-upload" class="bg-gray-200 text-black py-2 px-4 rounded-xl cursor-pointer w-full h-116 block text-center text-lg transition duration-400 ease-in-out hover:bg-gray-300 hover:transform hover:-translate-y-1 hover:font-semibold">Upload Foto</label>
                <input id="file-upload" type="file" class="hidden" />
            </form>
        </div>
        {{-- Right Side --}}
        <div class="bg-white border border-gray-200 rounded-lg shadow p-4 w-full">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg text-xl" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                    </li>
                    <li class="me-2">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 text-xl" id="dashboard-tab" data-tabs-target="#album" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Album</button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <h1 class="text-lg font-bold">Biodata</h1>
                    <div class="flex flex-col space-y-4">
                        <div class="flex items-center">
                            <label class="w-1/3 text-md">Nama / Nickname</label>
                            <input type="text" class="w-2/3 border border-gray-300 rounded-lg p-2" placeholder="Masukkan nama / nickname" />
                        </div>
                        <div class="flex items-center">
                            <label class="w-1/3 text-md">Jenis Kelamin</label>
                            <input type="text" class="w-2/3 border border-gray-300 rounded-lg p-2" placeholder="Masukkan jenis kelamin" />
                        </div>
                        <div class="flex items-center">
                            <label class="w-1/3 text-md">Tanggal Lahir</label>
                            <div class="relative w-2/3">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="datepicker-format" datepicker datepicker-min-date="06/04/2024" datepicker-max-date="05/05/2025" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                            </div>
                        </div>
                    </div>                    
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="album" role="tabpanel" aria-labelledby="dashboard-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
            </div>
            
        </div>
    </div>
@endsection