@extends('layouts.main-layout')
@section('title', 'My Order')
@section('content')
    <div class="flex flex-col items-center gap-12">
        @if ($ordersAsCustomer->isEmpty())
            <p class="mt-2 text-center">Kamu belum memiliki order sebagai customer!</p>
        @else
            <table class="w-3/4 text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="bg-blue-100 text-xs uppercase text-gray-700 dark:bg-blue-800 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left">Game</th>
                        <th scope="col" class="px-6 py-3 text-left">Gamer</th>
                        <th scope="col" class="px-6 py-3 text-left">Customer</th>
                        <th scope="col" class="px-6 py-3 text-left">Start</th>
                        <th scope="col" class="px-6 py-3 text-left">End</th>
                        <th scope="col" class="px-6 py-3 text-left">Match</th>
                        <th scope="col" class="px-6 py-3 text-left">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordersAsCustomer as $order)
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $order->game->name }}
                            </th>
                            <td class="px-6 py-4">{{ $order->gamer->name }}</td>
                            <td class="px-6 py-4">{{ $order->customer->name }}</td>
                            <td class="px-6 py-4">{{ $order->start_time ? $order->start_time : '-' }}</td>
                            <td class="px-6 py-4">{{ $order->end_time ? $order->end_time : '-' }}</td>
                            <td class="px-6 py-4">{{ $order->total_match ? $order->total_match : '-' }}</td>
                            <td class="px-6 py-4">{{ $order->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if ($ordersAsGamer->isEmpty())
            <p class="mt-2 text-center">Kamu belum memiliki order sebagai gamer!</p>
        @else
            <table class="w-3/4 text-left text-sm text-gray-500 rtl:text-right dark:text-gray-400">
                <thead class="bg-blue-100 text-xs uppercase text-gray-700 dark:bg-blue-800 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left">Game</th>
                        <th scope="col" class="px-6 py-3 text-left">Gamer</th>
                        <th scope="col" class="px-6 py-3 text-left">Customer</th>
                        <th scope="col" class="px-6 py-3 text-left">Start</th>
                        <th scope="col" class="px-6 py-3 text-left">End</th>
                        <th scope="col" class="px-6 py-3 text-left">Match</th>
                        <th scope="col" class="px-6 py-3 text-left">Status</th>
                        <th scope="col" class="px-6 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ordersAsGamer as $order)
                        <tr class="border-b bg-white dark:border-gray-700 dark:bg-gray-800">
                            <th scope="row"
                                class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                                {{ $order->game->name }}
                            </th>
                            <td class="px-6 py-4">{{ $order->gamer->name }}</td>
                            <td class="px-6 py-4">{{ $order->customer->name }}</td>
                            <td class="px-6 py-4">{{ $order->start_time ? $order->start_time : '-' }}</td>
                            <td class="px-6 py-4">{{ $order->end_time ? $order->end_time : '-' }}</td>
                            <td class="px-6 py-4">{{ $order->total_match ? $order->total_match : '-' }}</td>
                            <td class="px-6 py-4">{{ $order->status }}</td>
                            <td class="px-6 py-4">
                                <form action="{{ route('updateOrder', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="{{ $order->status === 'Finished' ? 'bg-gray-400 cursor-not-allowed opacity-50' : 'bg-blue-500 hover:bg-blue-600 focus:ring-blue-300' }} mb-2 rounded-lg px-5 py-2.5 text-sm font-medium text-white focus:outline-none focus:ring-4"
                                        {{ $order->status === 'Finished' ? 'disabled' : '' }}>
                                        Finish
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
