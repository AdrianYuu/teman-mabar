@extends('layouts.main-layout')

@section('title', 'Daftar Pemain')

@section('content')

    <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
        @foreach ($users->filter(fn($user) => $user->id !== auth()->id()) as $user)
            <a href="{{ route('playerDetailPage', ['id' => $user->id]) }}"
                class="group relative block overflow-hidden rounded-lg">
                <img class="h-60 w-full object-cover transition-transform duration-1000 group-hover:scale-105"
                    src="{{ $user->profile_picture_url ? $user->profile_picture_url : asset('assets/images/Profile-banner.jpg') }}"
                    alt="">
                <div class="opacity-35 absolute inset-0 bg-black transition-opacity duration-300 group-hover:opacity-0">
                </div>
                <p class="absolute bottom-2 left-2 text-lg font-bold text-gray-200">{{ $user->name }}</p>
            </a>
        @endforeach
    </div>

@endsection
