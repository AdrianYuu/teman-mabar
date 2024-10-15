@extends('layouts.main-layout')

@section('title', 'Register')

@section('content')
    <div class="w-4/5 h-full flex p-12 flex-col md:flex-row">
        <div class="w-full md:w-1/2 flex flex-col items-center"> {{-- Left Side --}}
            <img src={{ asset('assets/images/login/left-side-image.png') }} class="w-full hidden md:block" alt="Left Side Image">
        </div>
        <div class="w-full md:w-1/2 bg-slate-200 flex flex-col justify-center rounded-tr-xl rounded-br-xl"> {{-- Right Side --}}
            <div class="mb-12 text-center">
                <h1 class="text-3xl">Selamat Datang di <strong>TemanMabar</strong></h1>
                <p>Teman bermain, kapan saja, dimana saja!</p>
            </div>
            <form method="POST" action="{{ route('register') }}" class="max-w-sm mx-auto w-full">
                @csrf
                <label for="name-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5 4.33334C5 5.98734 6.346 7.33334 8 7.33334C9.654 7.33334 11 5.98734 11 4.33334C11 2.67934 9.654 1.33334 8 1.33334C6.346 1.33334 5 2.67934 5 4.33334ZM13.3333 14H14V13.3333C14 10.7607 11.906 8.66668 9.33333 8.66668H6.66667C4.09333 8.66668 2 10.7607 2 13.3333V14H13.3333Z"/>
                        </svg>                                                                             
                    </div>
                    <input type="text" id="name-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ketik nama lengkap kamu disini..." name="name">
                </div>
                <label for="email-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                            <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                        </svg>
                    </div>
                    <input type="text" id="email-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ketik email kamu disini..." name="email">
                </div>
                <label for="password-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4">Kata Sandi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" viewBox="0 0 12 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 4.33334C2 3.27248 2.42143 2.25506 3.17157 1.50492C3.92172 0.754771 4.93913 0.333344 6 0.333344C7.06087 0.333344 8.07828 0.754771 8.82843 1.50492C9.57857 2.25506 10 3.27248 10 4.33334H10.6667C11.0203 4.33334 11.3594 4.47382 11.6095 4.72387C11.8595 4.97392 12 5.31305 12 5.66668V12.3333C12 12.687 11.8595 13.0261 11.6095 13.2762C11.3594 13.5262 11.0203 13.6667 10.6667 13.6667H1.33333C0.979711 13.6667 0.640573 13.5262 0.390524 13.2762C0.140476 13.0261 0 12.687 0 12.3333V5.66668C0 5.31305 0.140476 4.97392 0.390524 4.72387C0.640573 4.47382 0.979711 4.33334 1.33333 4.33334H2ZM6 1.66668C6.70724 1.66668 7.38552 1.94763 7.88562 2.44773C8.38572 2.94782 8.66667 3.6261 8.66667 4.33334H3.33333C3.33333 3.6261 3.61428 2.94782 4.11438 2.44773C4.61448 1.94763 5.29276 1.66668 6 1.66668ZM7.33333 8.33334C7.33333 8.56739 7.27172 8.79731 7.15469 8.99999C7.03767 9.20268 6.86935 9.37099 6.66667 9.48801V10.3333C6.66667 10.5102 6.59643 10.6797 6.4714 10.8047C6.34638 10.9298 6.17681 11 6 11C5.82319 11 5.65362 10.9298 5.5286 10.8047C5.40357 10.6797 5.33333 10.5102 5.33333 10.3333V9.48801C5.07916 9.34125 4.88052 9.11472 4.76821 8.84356C4.65589 8.57239 4.63619 8.27175 4.71216 7.98825C4.78812 7.70475 4.95551 7.45423 5.18836 7.27556C5.4212 7.09688 5.7065 7.00002 6 7.00001C6.35362 7.00001 6.69276 7.14049 6.94281 7.39053C7.19286 7.64058 7.33333 7.97972 7.33333 8.33334Z" />
                        </svg>                                                   
                    </div>
                    <input type="password" id="password-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ketik kata sandi kamu disini..." name="password">
                </div>
                <label for="password-confirmation-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4">Konfirmasi Kata Sandi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" viewBox="0 0 12 15" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 4.33334C2 3.27248 2.42143 2.25506 3.17157 1.50492C3.92172 0.754771 4.93913 0.333344 6 0.333344C7.06087 0.333344 8.07828 0.754771 8.82843 1.50492C9.57857 2.25506 10 3.27248 10 4.33334H10.6667C11.0203 4.33334 11.3594 4.47382 11.6095 4.72387C11.8595 4.97392 12 5.31305 12 5.66668V12.3333C12 12.687 11.8595 13.0261 11.6095 13.2762C11.3594 13.5262 11.0203 13.6667 10.6667 13.6667H1.33333C0.979711 13.6667 0.640573 13.5262 0.390524 13.2762C0.140476 13.0261 0 12.687 0 12.3333V5.66668C0 5.31305 0.140476 4.97392 0.390524 4.72387C0.640573 4.47382 0.979711 4.33334 1.33333 4.33334H2ZM6 1.66668C6.70724 1.66668 7.38552 1.94763 7.88562 2.44773C8.38572 2.94782 8.66667 3.6261 8.66667 4.33334H3.33333C3.33333 3.6261 3.61428 2.94782 4.11438 2.44773C4.61448 1.94763 5.29276 1.66668 6 1.66668ZM7.33333 8.33334C7.33333 8.56739 7.27172 8.79731 7.15469 8.99999C7.03767 9.20268 6.86935 9.37099 6.66667 9.48801V10.3333C6.66667 10.5102 6.59643 10.6797 6.4714 10.8047C6.34638 10.9298 6.17681 11 6 11C5.82319 11 5.65362 10.9298 5.5286 10.8047C5.40357 10.6797 5.33333 10.5102 5.33333 10.3333V9.48801C5.07916 9.34125 4.88052 9.11472 4.76821 8.84356C4.65589 8.57239 4.63619 8.27175 4.71216 7.98825C4.78812 7.70475 4.95551 7.45423 5.18836 7.27556C5.4212 7.09688 5.7065 7.00002 6 7.00001C6.35362 7.00001 6.69276 7.14049 6.94281 7.39053C7.19286 7.64058 7.33333 7.97972 7.33333 8.33334Z" />
                        </svg>                                                   
                    </div>
                    <input type="password" id="password-confirmation-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ketik konfirmasi kata sandi kamu disini..." name="password_confirmation">
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-4">Daftar</button>
            </form>
            <div class="flex items-center my-4">
                <hr class="flex-1 border-t border-gray-800 ml-32" />
                <span class="mx-4 text-lg font-semibold text-gray-900 rounded-full px-3">atau masuk dengan</span>
                <hr class="flex-1 border-t border-gray-800 mr-32" />
            </div>
            <div class="flex flex-row justify-center gap-8">
                <a href=""><img src={{ asset('assets/images/login/google.png') }} class="w-12 h-12 rounded-full" alt="Google"></a>
                <a href=""><img src={{ asset('assets/images/login/x.png') }} class="w-12 h-12 rounded-full" alt="X"></a>
                <a href=""><img src={{ asset('assets/images/login/apple.jpg') }} class="w-12 h-12 rounded-full" alt="Apple"></a>
                <a href=""><img src={{ asset('assets/images/login/facebook.png') }} class="w-12 h-12 rounded-full" alt="Facebook"></a>
            </div>
            <p class="text-center mt-6">Sudah punya akun? <a href="{{ route('loginPage') }}" class="text-blue-500 font-medium">Login disini</a></p>
        </div>
    </div>
@endsection