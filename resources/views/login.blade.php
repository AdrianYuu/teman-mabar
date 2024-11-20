@extends('layouts.main-layout')

@section('title', 'Masuk')

@section('content')
    <div class="flex h-full w-4/5 flex-col p-12 md:flex-row">
        <div class="flex w-full flex-col items-center md:w-1/2"> {{-- Left Side --}}
            <img src={{ asset('assets/images/login/left-side-image.png') }} class="hidden w-full md:block"
                alt="Left Side Image">
        </div>
        <div class="flex w-full flex-col justify-center rounded-br-xl rounded-tr-xl bg-slate-200 md:w-1/2">
            {{-- Right Side --}}
            <div class="mb-12 text-center">
                <h1 class="text-3xl">Selamat Datang di <strong>TemanMabar</strong></h1>
                <p>Teman bermain, kapan saja, dimana saja!</p>
            </div>
            <form method="POST" action="{{ route('login') }}" class="mx-auto w-full max-w-sm">
                @csrf
                <label for="email-address-icon"
                    class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <div class="flex">
                    <span
                        class="rounded-e-0 inline-flex items-center rounded-s-md border border-e-0 border-gray-300 bg-gray-200 px-3 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-400">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <path
                                d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                            <path
                                d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                        </svg>
                    </span>
                    <input type="text" id="email-address-icon"
                        class="block w-full min-w-0 flex-1 rounded-r-md border border-gray-300 bg-gray-50 p-2.5 !pr-8 text-sm text-gray-900 focus:border-solid focus:border-gray-900 focus:outline-none focus:ring-0 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                        placeholder="Ketik email kamu disini..." name="email">
                </div>

                <label for="password-icon" class="mb-2 mt-4 block text-sm font-medium text-gray-900 dark:text-white">Kata
                    Sandi</label>
                <div class="relative flex">
                    <span
                        class="rounded-e-0 inline-flex items-center rounded-s-md border border-e-0 border-gray-300 bg-gray-200 px-3 text-sm text-gray-900 dark:border-gray-600 dark:bg-gray-600 dark:text-gray-400">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" viewBox="0 0 12 15" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M2 4.33334C2 3.27248 2.42143 2.25506 3.17157 1.50492C3.92172 0.754771 4.93913 0.333344 6 0.333344C7.06087 0.333344 8.07828 0.754771 8.82843 1.50492C9.57857 2.25506 10 3.27248 10 4.33334H10.6667C11.0203 4.33334 11.3594 4.47382 11.6095 4.72387C11.8595 4.97392 12 5.31305 12 5.66668V12.3333C12 12.687 11.8595 13.0261 11.6095 13.2762C11.3594 13.5262 11.0203 13.6667 10.6667 13.6667H1.33333C0.979711 13.6667 0.640573 13.5262 0.390524 13.2762C0.140476 13.0261 0 12.687 0 12.3333V5.66668C0 5.31305 0.140476 4.97392 0.390524 4.72387C0.640573 4.47382 0.979711 4.33334 1.33333 4.33334H2ZM6 1.66668C6.70724 1.66668 7.38552 1.94763 7.88562 2.44773C8.38572 2.94782 8.66667 3.6261 8.66667 4.33334H3.33333C3.33333 3.6261 3.61428 2.94782 4.11438 2.44773C4.61448 1.94763 5.29276 1.66668 6 1.66668ZM7.33333 8.33334C7.33333 8.56739 7.27172 8.79731 7.15469 8.99999C7.03767 9.20268 6.86935 9.37099 6.66667 9.48801V10.3333C6.66667 10.5102 6.59643 10.6797 6.4714 10.8047C6.34638 10.9298 6.17681 11 6 11C5.82319 11 5.65362 10.9298 5.5286 10.8047C5.40357 10.6797 5.33333 10.5102 5.33333 10.3333V9.48801C5.07916 9.34125 4.88052 9.11472 4.76821 8.84356C4.65589 8.57239 4.63619 8.27175 4.71216 7.98825C4.78812 7.70475 4.95551 7.45423 5.18836 7.27556C5.4212 7.09688 5.7065 7.00002 6 7.00001C6.35362 7.00001 6.69276 7.14049 6.94281 7.39053C7.19286 7.64058 7.33333 7.97972 7.33333 8.33334Z" />
                        </svg>
                    </span>
                    <input type="password" id="password-icon"
                        class="block w-full min-w-0 flex-1 rounded-r-md border border-gray-300 bg-gray-50 p-2.5 !pr-8 text-sm text-gray-900 focus:border-solid focus:border-gray-900 focus:outline-none focus:ring-0 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                        placeholder="Ketik kata sandi kamu disini..." name="password">
                    <span class="absolute inset-y-0 right-0 flex cursor-pointer items-center p-2"
                        onclick="togglePassword()">
                        <svg id="open-eye" width="24" height="24" class="hidden h-5 w-5" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 9C11.2044 9 10.4413 9.31607 9.87868 9.87868C9.31607 10.4413 9 11.2044 9 12C9 12.7956 9.31607 13.5587 9.87868 14.1213C10.4413 14.6839 11.2044 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12C15 11.2044 14.6839 10.4413 14.1213 9.87868C13.5587 9.31607 12.7956 9 12 9ZM12 17C10.6739 17 9.40215 16.4732 8.46447 15.5355C7.52678 14.5979 7 13.3261 7 12C7 10.6739 7.52678 9.40215 8.46447 8.46447C9.40215 7.52678 10.6739 7 12 7C13.3261 7 14.5979 7.52678 15.5355 8.46447C16.4732 9.40215 17 10.6739 17 12C17 13.3261 16.4732 14.5979 15.5355 15.5355C14.5979 16.4732 13.3261 17 12 17ZM12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5C17 19.5 21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5Z"
                                fill="black" />
                        </svg>
                        <svg id="close-eye" width="16" height="16" class="h-5 w-5" viewBox="0 0 16 16" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.79 12.912L9.176 11.297C8.55184 11.5202 7.87715 11.5615 7.23042 11.4162C6.58369 11.2709 5.99153 10.9449 5.52282 10.4762C5.05411 10.0075 4.72814 9.41531 4.58283 8.76858C4.43752 8.12185 4.47885 7.44716 4.702 6.823L2.642 4.763C0.938 6.278 0 8 0 8C0 8 3 13.5 8 13.5C8.96049 13.4975 9.91019 13.2973 10.79 12.912ZM5.21 3.088C6.08981 2.70266 7.03951 2.50251 8 2.5C13 2.5 16 8 16 8C16 8 15.061 9.721 13.359 11.238L11.297 9.176C11.5202 8.55184 11.5615 7.87715 11.4162 7.23042C11.2709 6.58369 10.9449 5.99153 10.4762 5.52282C10.0075 5.05411 9.41531 4.72814 8.76858 4.58283C8.12185 4.43752 7.44716 4.47885 6.823 4.702L5.21 3.088Z"
                                fill="black" />
                            <path
                                d="M5.525 7.646C5.46999 8.03031 5.50524 8.42215 5.62796 8.79047C5.75068 9.15879 5.95749 9.49347 6.23201 9.76799C6.50653 10.0425 6.8412 10.2493 7.20953 10.372C7.57785 10.4948 7.96969 10.53 8.354 10.475L5.525 7.646ZM10.475 8.354L7.646 5.524C8.03031 5.46899 8.42215 5.50424 8.79047 5.62696C9.15879 5.74968 9.49347 5.95649 9.76799 6.23101C10.0425 6.50553 10.2493 6.8402 10.372 7.20853C10.4948 7.57685 10.53 7.96869 10.475 8.353V8.354ZM13.646 14.354L1.646 2.354L2.354 1.646L14.354 13.646L13.646 14.354Z"
                                fill="black" />
                        </svg>
                    </span>
                </div>

                @error('invalidCredentials')
                    <p class="mt-2 text-red-500">{{ $message }}</p>
                @enderror
                <button type="submit"
                    class="mt-4 w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Masuk</button>
            </form>
            <div class="my-4 flex items-center">
                <hr class="ml-32 flex-1 border-t border-gray-800" />
                <span class="mx-4 rounded-full px-3 text-lg font-semibold text-gray-900">atau masuk dengan</span>
                <hr class="mr-32 flex-1 border-t border-gray-800" />
            </div>
            <div class="flex flex-row justify-center gap-8">
                <a href=""><img src={{ asset('assets/images/login/google.png') }} class="h-12 w-12 rounded-full"
                        alt="Google"></a>
                <a href=""><img src={{ asset('assets/images/login/x.png') }} class="h-12 w-12 rounded-full"
                        alt="X"></a>
                <a href=""><img src={{ asset('assets/images/login/apple.jpg') }} class="h-12 w-12 rounded-full"
                        alt="Apple"></a>
                <a href=""><img src={{ asset('assets/images/login/facebook.png') }} class="h-12 w-12 rounded-full"
                        alt="Facebook"></a>
            </div>
            <p class="mt-6 text-center">Belum punya akun? <a href="{{ route('registerPage') }}"
                    class="font-medium text-blue-500">Register disini</a></p>
        </div>
    </div>
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password-icon');
            const openEyeIcon = document.getElementById('open-eye');
            const closedEyeIcon = document.getElementById('close-eye')

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text'
                openEyeIcon.style.display = 'block'
                closedEyeIcon.style.display = 'none'
            } else {
                passwordInput.type = 'password'
                openEyeIcon.style.display = 'none'
                closedEyeIcon.style.display = 'block'
            }
        }
    </script>
@endsection
