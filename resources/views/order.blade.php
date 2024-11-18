@extends('layouts.main-layout')

@section('title', 'My Order')

@section('content')
    @if ($orders->isEmpty())
        <p class="mt-2 text-center">There is no order yet!</p>
    @else
        <table class="mx-12 w-full text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
            <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="w-1/4 px-6 py-3 text-left">
                        Game
                    </th>
                    <th scope="col" class="w-1/4 px-6 py-3 text-left">
                        Gamer
                    </th>
                    <th scope="col" class="w-1/4 px-6 py-3 text-left">
                        Customer
                    </th>
                    <th scope="col" class="w-1/4 px-6 py-3 text-left">
                        Start
                    </th>
                    <th scope="col" class="w-1/4 px-6 py-3 text-left">
                        End
                    </th>
                    <th scope="col" class="w-1/4 px-6 py-3 text-left">
                        Match
                    </th>
                    <th scope="col" class="w-1/4 px-6 py-3 text-left">
                        Status
                    </th>
                    <th scope="col" class="w-1/4 px-6 py-3 text-left">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                        <th scope="row"
                            class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                            {{ $order->game->name }}
                        </th>
                        <th scope="row"
                            class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                            {{ $order->gamer->name }}
                        </th>
                        <th scope="row"
                            class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                            {{ $order->customer->name }}
                        </th>
                        <th scope="row"
                            class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                            {{ $order->start_time ? $order->start_time : '-' }}
                        </th>
                        <th scope="row"
                            class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                            {{ $order->end_time ? $order->end_time : '-' }}
                        </th>
                        <th scope="row"
                            class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                            {{ $order->total_match ? $order->total_match : '-' }}
                        </th>
                        <th scope="row"
                            class="whitespace-nowrap px-6 py-4 text-xl font-medium text-gray-900 dark:text-white">
                            {{ $order->status }}
                        </th>
                        <td class="flex px-6 py-4">
                            @if (auth()->user() && auth()->user()->id === $order->gamer->id && $order->status !== 'Finished')
                                <form action="{{ route('updateOrder', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="{{ $order->status === 'Finished' ? 'bg-blue-500' : 'bg-yellow-400' }} {{ $order->status === 'Finished' ? 'cursor-not-allowed opacity-50' : '' }} mb-2 me-2 rounded-lg px-5 py-2.5 text-sm font-medium text-white hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 dark:focus:ring-yellow-900"
                                        {{ $order->status === 'Finished' ? 'disabled' : '' }}>
                                        Finish
                                    </button>
                                </form>
                            @else
                                <button
                                    class="mb-2 me-2 cursor-not-allowed rounded-lg bg-blue-500 px-5 py-2.5 text-sm font-medium text-white opacity-50 hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900"
                                    disabled>
                                    Disabled
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
