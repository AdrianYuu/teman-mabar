@extends('layouts.main-layout')

@section('title', 'Forum')

@section('content')
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="mx-auto max-w-screen-lg px-4 2xl:px-0">
            <div class="lg:flex lg:items-center lg:justify-between lg:gap-4">
                <h2 class="shrink-0 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Forum</h2>
                <form action="{{ route('forumPage') }}" method="GET" class="mt-4 w-full gap-4 sm:flex sm:items-center sm:justify-end lg:mt-0">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full flex-1 lg:max-w-sm">
                        <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search" class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 !ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder="Cari pertanyaanmu disini dengan kata kunci!!" name="search"/>
                    </div>
                    <button onclick="showQuestionModal()" type="button" class="flex items-center justify-center focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-200 dark:divide-gray-800">
                    @foreach ($forumQuestions as $question)
                        <div class="space-y-4 py-6 md:py-8">
                            <div class="grid gap-4">
                                <div>
                                    <span class="inline-block rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300 md:mb-0"> {{ $question->answers_count }} answers </span>
                                </div>
                                <div class="flex justify-between">
                                    <a href="{{ route('forumDetailPage', ['id'=>$question->id]) }}" class="text-xl font-semibold text-gray-900 hover:underline dark:text-white w-3/4">“{{ $question->title }}”</a>
                                    <p class="pt-1">{{ $question->created_at->translatedFormat('l, j F Y') }}</p>
                                </div>
                            </div>
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400 break-words w-full">{{ Str::limit($question->question, 200, '...') }}</p>
                            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                oleh
                                <a href="#" class="text-gray-900 hover:underline dark:text-white">{{ $question->user->name }}</a>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-6 flex flex-col items-center justify-center lg:justify-start">
                {{ $forumQuestions->links('vendor.pagination.tailwind-custom') }}
            </div>
        </div>
    </section>

    @if ($errors->StoreForumQuestion->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                questionModal.show()
            });
        </script>
    @endif

    <div id="question-popup" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
            <form action="{{ route('storeForumQuestion') }}" method="POST" class="flex flex-col justify-between relative bg-white rounded-lg shadow dark:bg-gray-800 py-4">
                @csrf
                <div class="flex items-center rounded-t border-b border-gray-200 px-8 dark:border-gray-700 md:px-0">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white pb-2">Tambah Pertanyaan</h3>
                </div>
                <div class="px-8 flex flex-col gap-y-4 mt-4">
                    <div>
                        <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Judul Forum <span class="text-gray-500 dark:text-gray-400">(10-100 karakter)</span></label>
                        <input type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rekomendasi VGA Terbaik 2024" value="{{ old('title') }}" name="title"/>
                        @error('title', 'StoreForumQuestion')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div> 
                    <div>
                        <label for="question" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Pertanyaan <span class="text-gray-500 dark:text-gray-400">(100-1000 karakter)</span></label>
                        <textarea id="question" rows="6" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500 resize-none" placeholder="Saya memiliki VGA RTX2080 dan ingin mengganti ke VGA baru, VGA apakah yang bisa saya menggantikan performa VGA saya sekarang?" name="question">{{ old('question') }}</textarea>
                        @error('question', 'StoreForumQuestion')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <div>
                            <input id="terms" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" name="terms"/>
                            <label for="terms" class="ms-2 text-sm font-medium text-gray-500 dark:text-gray-400">I have read and agree with the <a href="#" class="text-blue-700 hover:underline dark:text-primary-500">terms and conditions</a>.</label>
                        </div>
                        @error('terms', 'StoreForumQuestion')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="justify-between items-center pt-0 space-y-4 sm:flex sm:space-y-0">
                        <div class="justify-center items-center sm:space-x-4 sm:flex sm:space-y-0">
                            <button id="close-modal" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Batal</button>
                            <button id="confirm-button" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showQuestionModal() {
            questionModal.show();
        }

        const modalEl = document.getElementById('question-popup');
        const questionModal = new Modal(modalEl, {
            placement: 'center'
        });

        const closeModalEl = document.getElementById('close-modal');
        closeModalEl.addEventListener('click', function() {
            questionModal.hide();
        });
    </script>
@endsection