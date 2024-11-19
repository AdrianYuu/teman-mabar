@extends('layouts.main-layout')

@section('title', 'Forum')

@section('content')
<section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-lg px-4 2xl:px-0">
        <div class="lg:flex lg:items-center lg:justify-between lg:gap-4">
            <h2 class="shrink-0 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Forum</h2>
            <form class="mt-4 w-full gap-4 sm:flex sm:items-center sm:justify-end lg:mt-0">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full flex-1 lg:max-w-sm">
                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="simple-search" class="block w-full rounded-lg border border-gray-300 bg-gray-50 px-4 py-2.5 !ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500" placeholder="Search Questions & Answers" required />
                </div>
                <button type="button" data-modal-target="question-modal" data-modal-toggle="question-modal" class="mt-4 w-full shrink-0 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:mt-0 sm:w-auto">Ask a question</button>
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
                                <a href="#" class="text-xl font-semibold text-gray-900 hover:underline dark:text-white w-3/4">“{{ $question->title }}”</a>
                                <p class="pt-1">{{ $question->created_at->translatedFormat('l, j F Y') }}</p>
                            </div>
                        </div>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400">{{ Str::limit($question->question, 200, '...') }}</p>
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
<div id="question-modal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden antialiased md:inset-0">
    <div class="relative max-h-full w-full max-w-xl p-4">
        <!-- Modal content -->
        <div class="relative rounded-lg bg-white shadow dark:bg-gray-800">
            <!-- Modal header -->
            <div class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 dark:border-gray-700 md:p-5">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Buat Forum</h3>
                <button type="button" class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="question-modal">
                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form action="{{ route('storeForumQuestion') }}" method="POST" class="p-4 md:p-5">
                @csrf
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="col-span-2">
                        <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Judul Forum <span class="text-gray-500 dark:text-gray-400">(10-100 characters)</span></label>
                        <input type="text" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Rekomendasi VGA Terbaik 2024" name="title"/>
                    </div>
                    <div class="col-span-2">
                        <label for="question" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Pertanyaan <span class="text-gray-500 dark:text-gray-400">(50-1000 characters)</span></label>
                        <textarea id="question" rows="6" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500 resize-none" placeholder="Saya memiliki VGA RTX2080 dan ingin mengganti ke VGA baru, VGA apakah yang bisa saya menggantikan performa VGA saya sekarang?" name="question"></textarea>
                    </div>
                    <div class="col-span-2">
                        <div class="flex items-center">
                            <input id="link-checkbox" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600" name="terms_agreement"/>
                            <label for="link-checkbox" class="ms-2 text-sm font-medium text-gray-500 dark:text-gray-400">I have read and agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-200 pt-4 dark:border-gray-700 md:pt-5">
                    <button type="submit" class="me-2 inline-flex items-center rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit question</button>
                    <button type="button" data-modal-toggle="question-modal" class="me-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection