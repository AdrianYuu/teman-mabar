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
                    <form method="POST" action="{{ route('updateUser') }}" id="profile-form" class="flex flex-col space-y-4">
                        @method('PUT')
                        @csrf
                        <div class="flex items-center">
                            <label class="w-1/3 text-md">Email</label>
                            <input type="text" id="disabled-input" aria-label="disabled input" class="bg-gray-200 border w-2/3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value={{ Auth::user()->email }} disabled>
                        </div>
                        <div class="flex items-center">
                            <label class="w-1/3 text-md">Nama / Nickname</label>
                            <input type="text" class="w-2/3 border border-gray-300 rounded-lg p-2.5 text-sm text-gray-900 bg-gray-50" placeholder="Masukkan nama / nickname" value={{ Auth::user()->name }} name="name"/>
                        </div>
                        <div class="flex items-center">
                            <label class="w-1/3 text-md">Jenis Kelamin</label>
                            <div class="flex items-center ps-4 border w-1/3 border-gray-200 rounded dark:border-gray-700">
                                <input id="bordered-radio-1" type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="Laki-laki" name="gender" {{ Auth::user()->gender === "Laki-laki" ? 'checked' : ''}}>
                                <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm text-gray-900 dark:text-gray-300">Laki-laki</label>
                            </div>
                            <div class="flex items-center ps-4 border w-1/3 border-gray-200 rounded dark:border-gray-700">
                                <input id="bordered-radio-2" type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="Perempuan" name="gender" {{ Auth::user()->gender === "Perempuan" ? 'checked' : ''}}>
                                <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm text-gray-900 dark:text-gray-300">Perempuan</label>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <label class="w-1/3 text-md">Tanggal Lahir</label>
                            <div class="relative w-2/3">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input id="datepicker-format" datepicker datepicker-min-date="06-04-2024" datepicker-max-date="05-05-2025" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" value={{ \Carbon\Carbon::parse(Auth::user()->date_of_birth)->format('m-d-Y') }} name="date_of_birth">
                            </div>
                        </div>
                        <div class="flex items-center">
                            <label class="w-1/3 text-md">Biografi</label>
                            <textarea id="message" rows="4" class="block p-2.5 w-2/3 h-24 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 resize-none" placeholder="Masukkan biografi" name="biography">{{ Auth::user()->biography }}</textarea>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" id="update-button" class="text-white bg-blue-600 dark:bg-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update Profil</button>
                        </div>
                    </form>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="album" role="tabpanel" aria-labelledby="dashboard-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
            </div>
        </div>
    </div>
@endsection