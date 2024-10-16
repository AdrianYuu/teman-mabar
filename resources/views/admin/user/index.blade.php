@extends('layouts.admin-main-layout')

@section('title', 'Admin Dashboard | User')

@section('content')

    <div class="relative overflow-x-auto">
        @if ($users->isEmpty())
            <p class="mt-2 text-center">There is no user yet!</p>
        @else
            <table class="w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="w1/5 px-6 py-3 text-left">
                            Name
                        </th>
                        <th scope="col" class="w1/5 px-6 py-3 text-left">
                            Email
                        </th>
                        <th scope="col" class="w1/5 px-6 py-3 text-left">
                            Followers
                        </th>
                        <th scope="col" class="w1/5 px-6 py-3 text-left">
                            Subscribers
                        </th>
                        <th scope="col" class="w1/5 px-6 py-3 text-left">
                            Coin
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                                {{ $user->name }}
                            </th>
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                                {{ $user->email }}
                            </th>
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                                {{ $user->follower_count }}
                            </th>
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                                {{ $user->subscriber_count }}
                            </th>
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                                {{ $user->coin }}
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        {{-- {{ $users->links('vendor.pagination.tailwind-custom') }} --}}

    </div>
@endsection
