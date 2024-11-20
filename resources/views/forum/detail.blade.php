@extends('layouts.main-layout')

@section('title', 'Forum Detail')

@section('content')
    <section class="bg-white dark:bg-gray-900 py-2 lg:py-4 antialiased">
        <div class="max-w-2xl mx-auto px-4">
            <a href="{{ route('forumPage') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 p-2">
                <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10" transform="rotate(180)">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>
                Forum
            </a>        
            <div class="flex flex-col justify-between items-center mb-6">
                <h2 class="text-2xl lg:text-lg font-bold text-gray-900 dark:text-white">{{ $question->title }}</h2>
                <p class="text-md">{{ $question->question }}</p>
                <div class="w-full mt-2">
                    <p>Oleh: {{ $question->user->name }}</p>
                </div>
            </div>
            <form action="{{ route('storeForumComment', ['id'=>$question->id]) }}" method="POST">
                @csrf
                <div class="py-2 px-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea id="comment" rows="6" class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800 resize-none" placeholder="Tulis komentar kamu disini... (5-1000 karakter)" name="comment"></textarea>
                </div>
                @error('comment')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
                <button type="submit" class="inline-flex items-center py-2.5 px-4 mt-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-blue-800">Tambahkan komentar</button>
            </form>
            @foreach ($comments as $comment)
                <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                    <footer class="flex justify-between items-center mb-2">
                        <div class="flex items-center justify-between w-full">
                            <p class="inline-flex items-center text-sm text-gray-900 dark:text-white font-semibold"><img class="mr-2 w-8 h-8 border-2 border-gray-600 rounded-full" src="{{ $comment->user->profile_picture_url ?? asset('assets/images/Profile-icon.jpg') }}" alt="{{ $comment->user->name }}">{{ $comment->user->name }}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400 text-right"><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{ $comment->created_at->translatedFormat('l, j F Y') }}</time></p>
                        </div>
                    </footer>
                    <p class="text-gray-500 dark:text-gray-400">{{ $comment->comment }}</p>
                </article>
            @endforeach
        </div>
    </section>
@endsection