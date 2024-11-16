@extends('layouts.main-layout')

@section('title', 'Profile')

@section('content')
    <div class="flex flex-col w-1/2">
        <div class="flex w-full gap-12">
            {{-- Left Side --}}
            <div class="w-2/3 bg-white flex flex-col justify-between items-center justi border border-gray-200 rounded-lg shadow p-4">
                <img class="rounded-lg object-cover h-full" src="{{ Auth::user()->profile_picture_url ? Auth::user()->profile_picture_url : asset('assets/images/Profile-banner.jpg') }}" alt="" />
                <form action="{{ route('upload') }}" method="POST" class="mt-6 w-full" id="form-file" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <label for="file-upload" class="bg-gray-200 text-black py-2 px-4 rounded-xl cursor-pointer w-full h-116 block text-center text-lg transition duration-400 ease-in-out hover:bg-gray-300 hover:transform hover:-translate-y-1 hover:font-semibold">Upload Foto</label>
                    <input id="file-upload" type="file" class="hidden" name="profile_picture" onchange="uploadPicture()"/>
                </form>
            </div>
            {{-- Right Side --}}
            <div class="bg-white border border-gray-200 rounded-lg shadow p-4 w-full h-[35rem]">
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
                        <form action="{{ route('updateUser') }}" method="POST" id="profile-form" class="flex flex-col space-y-4">
                            @method('PUT')
                            @csrf
                            <div class="flex items-center">
                                <label class="w-1/3 text-md">Email</label>
                                <input type="text" id="disabled-input" aria-label="disabled input" class="bg-gray-200 border w-2/3 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ Auth::user()->email }}" disabled>
                            </div>
                            <div class="flex items-center">
                                <label class="w-1/3 text-md">Nama / Nickname</label>
                                <input type="text" class="w-2/3 border border-gray-300 rounded-lg p-2.5 text-sm text-gray-900 bg-gray-50" placeholder="Masukkan nama / nickname" value="{{ $authUser->name }}" name="name"/>
                            </div>
                            <div class="flex items-center">
                                <label class="w-1/3 text-md">Jenis Kelamin</label>
                                <div class="flex items-center w-1/3 max-h-8 border-gray-200 rounded dark:border-gray-700">
                                    <input id="bordered-radio-1" type="radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="Laki-laki" name="gender" {{ Auth::user()->gender === "Laki-laki" ? 'checked' : ''}}>
                                    <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm text-gray-900 dark:text-gray-300">Laki-laki</label>
                                </div>
                                <div class="flex items-center w-1/3 max-h-8 border-gray-200 rounded dark:border-gray-700">
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
                        <div class="grid grid-cols-3 gap-2">
                            <img class="h-full w-full rounded-lg shadow-xl dark:shadow-gray-800" src="{{ asset('assets/images/profile-picture.jpg') }}" alt="image description">
                            <img class="h-auto w-full rounded-lg shadow-xl dark:shadow-gray-800" src="{{ asset('assets/images/profile-picture.jpg') }}" alt="image description">
                            <img class="h-auto w-full rounded-lg shadow-xl dark:shadow-gray-800" src="{{ asset('assets/images/profile-picture.jpg') }}" alt="image description">
                            <img class="h-auto w-full rounded-lg shadow-xl dark:shadow-gray-800" src="{{ asset('assets/images/profile-picture.jpg') }}" alt="image description">
                        </div>
                    </div>                
                </div>
            </div>
        </div>
        <div class="w-full bg-white border border-gray-200 rounded-lg shadow p-4 mt-4">
            <div class="flex justify-between">
                <h1 class="text-2xl font-medium">Game yang dimainkan</h1>
                <button onclick="showPrivacyModal()" type="button" class="flex items-center justify-center focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                </button>
            </div>
            <div class="flex flex-row items-center overflow-x-auto overflow-y-hidden whitespace-nowrap gap-x-4 py-2">
                @if ($userGames->isEmpty())
                    <div id="toast-warning" class="flex justify-center items-center w-1/2 max-w-xs p-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 m-auto" role="alert">
                        <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-orange-500 bg-orange-100 rounded-lg dark:bg-orange-700 dark:text-orange-200">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
                            </svg>
                            <span class="sr-only">Warning icon</span>
                        </div>
                        <div class="ms-3 text-sm font-normal">Daftar permainan belum ditambahkan.</div>
                    </div>
                @else
                    @foreach ($userGames as $userGame)
                        <img class="game-img w-1/6 h-4/5 rounded-lg shadow-md cursor-pointer" src="{{ $userGame->game->game_picture_url }}" alt="{{ $userGame->game->name }}" id="{{ $userGame->game->id }}" price="{{ $userGame->price }}" price_type="{{ $userGame->game->price_type }}" title="{{ $userGame->game->name }}" >
                    @endforeach
                @endif
            </div>
            <div id="info-popup" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
                    <form action="{{ route('storeUserPriceDetail') }}" method="POST" class="flex flex-col justify-between relative p-4 bg-white rounded-lg shadow  dark:bg-gray-800 md:p-8 gap-y-4">
                        @csrf
                        <div class="text-sm font-light text-gray-500 dark:text-gray-400">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white">Tambah Permainan</h3>
                        </div>
                        <div>
                            <label for="game_id" class="mb-2 block text-sm text-gray-900 dark:text-white">Permainan</label>
                            <select id="game_id" name="game_id"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                                <option value="" selected>Please select one...</option>
                                @foreach ($games as $game)
                                    <option value={{ $game->id }} price_type={{ $game->price_type }}>{{ $game->name }}</option>
                                @endforeach
                            </select>
                            @error('game_id', 'StoreUserPriceDetail')
                                <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="price-type-disabled-input" class="block mb-2 text-sm text-gray-900 dark:text-white">Tipe</label>
                            <input type="text" id="price-type-disabled-input" aria-label="disabled input" class="bg-gray-200 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                        </div>
                        <div>
                            <label for="price" class="block mb-2 text-sm text-gray-900 dark:text-white">Harga</label>
                            <input type="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="10" name="price"/>
                            @error('price', 'StoreUserPriceDetail')
                                <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="justify-between items-center pt-0 space-y-4 sm:flex sm:space-y-0">
                            <div class="justify-center items-center sm:space-x-4 sm:flex sm:space-y-0">
                                <button id="close-modal" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Batal</button>
                                <button id="confirm-button" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Tambah</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <form action="{{ route('updateGamePrice') }}" method="POST" class="flex flex-col gap-4">
                @method('PUT')
                @csrf
                <h1 id="title">Tarif Bermain -</h1>
                <div class="flex flex-row items-center gap-4">
                    <p id="pricing_type">Per</p>
                    <input type="text" id="user-detail-price-input" value=0 class="w-2/12 h-8 px-2 bg-gray-300" name="price" disabled>
                    <input type="text" id="update-game-price-id-input" value="" class="hidden" name="update_id">
                    <svg class="w-10 h-10" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_430_4)">
                            <path d="M11.4164 10.7811C13.6525 8.00684 13.7518 4.37691 11.6383 2.67342C9.52484 0.969931 5.99882 1.83796 3.76275 4.61222C1.52668 7.38648 1.42732 11.0164 3.54081 12.7199C5.6543 14.4234 9.18032 13.5554 11.4164 10.7811Z" fill="#FCEA2B"/>
                            <path d="M11.5864 2.67335C10.7473 2.01971 9.68949 1.71271 8.63084 1.81557C9.44744 1.86575 10.229 2.16514 10.8702 2.67335C12.9835 4.3769 12.8844 8.00668 10.6484 10.7809C9.28395 12.4738 7.4395 13.4551 5.72839 13.5773C7.62395 13.7193 9.80684 12.7131 11.3644 10.7809C13.6004 8.00668 13.6999 4.37668 11.5864 2.67335Z" fill="white"/>
                            <path d="M12.2998 2.9071C12.1886 2.81729 12.073 2.73289 11.9536 2.65422C11.9457 2.6504 11.9375 2.64706 11.9292 2.64422C11.8909 2.62529 11.8481 2.61743 11.8056 2.62155C11.762 2.62595 11.7209 2.64426 11.6885 2.67377C11.6812 2.67847 11.6743 2.68359 11.6676 2.6891C11.6634 2.69355 11.6621 2.69955 11.6583 2.70422C11.6545 2.70888 11.6492 2.71177 11.6456 2.71688C11.6419 2.72483 11.6386 2.73299 11.6358 2.74133C11.6167 2.77999 11.6088 2.82328 11.6132 2.86622C11.6151 2.88004 11.6183 2.89366 11.6227 2.90688C11.6305 2.93484 11.645 2.96048 11.6649 2.98155C11.6697 2.98904 11.6749 2.99624 11.6805 3.0031C13.5201 4.69999 13.3283 8.05555 11.2438 10.642C9.08783 13.3164 5.69494 14.1709 3.68072 12.5471C3.66767 12.5385 3.65374 12.5313 3.63917 12.5256L3.62694 12.5191C3.60571 12.5102 3.58322 12.5047 3.56028 12.5027L3.5425 12.5011C3.49507 12.5 3.44871 12.5154 3.41139 12.5447C3.40389 12.5485 3.39662 12.5528 3.38961 12.5575C3.38517 12.5613 3.38361 12.5667 3.37983 12.5709C3.37628 12.5747 3.37139 12.5764 3.36806 12.5804C3.36423 12.587 3.36074 12.5937 3.35761 12.6007C3.34684 12.6162 3.3381 12.6331 3.33161 12.6509C3.32947 12.658 3.32769 12.6652 3.32628 12.6724C3.32106 12.694 3.31912 12.7163 3.3205 12.7384L3.3225 12.7513C3.32577 12.7755 3.33297 12.7989 3.34383 12.8207L3.34983 12.8307C3.35644 12.845 3.36456 12.8587 3.37405 12.8713C3.53054 13.0443 3.7004 13.2046 3.88206 13.3509C4.73121 14.0226 5.78639 14.3801 6.86894 14.3631C8.77783 14.3631 10.8445 13.3675 12.3196 11.5375C14.6405 8.65822 14.6316 4.78644 12.2998 2.9071Z" fill="#F1B31C"/>
                            <path d="M4.58936 9.93776C4.60558 9.88621 4.72491 9.44576 4.74069 9.39443C6.0558 9.41776 6.12069 9.37399 6.31602 8.72576C6.68491 7.50176 6.79247 7.28265 7.16158 6.05865C7.29113 5.62932 7.26824 5.53554 6.65269 5.41821L6.2778 5.3491C6.2918 5.30376 6.3758 4.88799 6.3898 4.84287C7.29739 4.84346 8.20405 4.78489 9.10402 4.66754L7.88202 8.88976C7.69136 9.54888 7.71491 9.60176 8.97758 9.84576C8.96291 9.89776 8.84424 10.3387 8.8298 10.3909L4.58936 9.93776Z" fill="#F1B31C"/>
                            <path d="M11.8307 2.83932C11.9433 2.91355 12.053 2.9937 12.16 3.07977C14.4 4.8851 14.3938 8.60933 12.1465 11.3975C9.89912 14.1858 6.26112 14.9831 4.02112 13.1778C3.84853 13.0388 3.68714 12.8865 3.53845 12.7222" stroke="black" stroke-width="0.444444" stroke-miterlimit="10"/>
                            <path d="M11.4164 10.7811C13.6525 8.00684 13.7518 4.37691 11.6383 2.67342C9.52484 0.969931 5.99882 1.83796 3.76275 4.61222C1.52668 7.38648 1.42732 11.0164 3.54081 12.7199C5.6543 14.4234 9.18032 13.5554 11.4164 10.7811Z" stroke="black" stroke-width="0.444444" stroke-miterlimit="10"/>
                            <path d="M11.4162 10.7811L12.1464 11.3978M10.648 11.6133L11.2915 12.3051M9.83487 12.2892L10.3635 13.0165M9.0118 12.8691L9.39051 13.6768M8.12297 13.2048L8.3358 14.0537M7.19368 13.2743L7.2205 14.1538M6.25015 13.0886L6.09395 13.9743M5.31976 12.6623L4.98702 13.5275M4.42549 12.0132L3.94502 12.8293M3.5928 11.1725L3.01261 11.9156M3.16805 10.1859L2.53778 10.8323M3.16578 9.09284L2.52461 9.62031M3.50094 8.0415L2.88764 8.5025M4.17259 7.09706L3.61853 7.3738M5.09977 6.3331L4.62487 6.41681M6.1726 5.79615L5.78732 5.69436M7.2686 5.47126L6.97344 5.27862M8.26177 5.35636L8.04832 5.07906" stroke="black" stroke-width="0.444444" stroke-miterlimit="10"/>
                        </g>
                        <defs>
                            <clipPath id="clip0_430_4">
                                <rect width="16" height="16" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <div class="flex justify-start gap-x-4">
                    <button type="button" id="delete-price-button" class="text-white bg-red-900 dark:bg-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-not-allowed" disabled>Hapus</button>
                    <button type="submit" id="update-price-button" class="text-white bg-blue-900 dark:bg-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-not-allowed" disabled>Update</button>
                </div>
            </form>
            <form action="{{ route('destroyUserPriceDetail') }}" method="POST" id="delete-form">
                @method('DELETE')
                @csrf
                <input type="text" id="delete-game-price-id-input" value="" class="hidden" name="delete_id">
            </form>
        </div>
    </div>

    @if ($errors->StoreUserPriceDetail->any())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                privacyModal.show()
            });
        </script>
    @endif

    <script>
        function uploadPicture(input)
        {
            var form = document.getElementById('form-file');
            form.submit();
        }

        function showPrivacyModal() {
            privacyModal.show();
        }

        const modalEl = document.getElementById('info-popup');
        const privacyModal = new Modal(modalEl, {
            placement: 'center'
        });

        const closeModalEl = document.getElementById('close-modal');
        closeModalEl.addEventListener('click', function() {
            privacyModal.hide();
        });

        document.getElementById('game_id').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            var price = selectedOption.getAttribute('price_type');
            document.getElementById('price-type-disabled-input').value = price;
        });

        document.getElementById('delete-price-button').addEventListener('click', function() {
            document.getElementById('delete-form').submit();
        });

        document.addEventListener('DOMContentLoaded', function () {
            const images = document.querySelectorAll('.game-img');

            images.forEach(image => {
                image.addEventListener('click', (e) => {
                    const id = e.target.getAttribute('id');
                    const price = e.target.getAttribute('price');
                    const name = e.target.getAttribute('title');
                    const priceType = e.target.getAttribute('price_type');
                    
                    const updateGamePriceInput = document.getElementById('update-game-price-id-input');
                    const deleteGamePriceInput = document.getElementById('delete-game-price-id-input')
                    const priceInput = document.getElementById('user-detail-price-input');
                    const priceTypeElement = document.getElementById('pricing_type')
                    const titleElement = document.getElementById('title');
                    const deleteButton = document.getElementById('delete-price-button');
                    const updateButton = document.getElementById('update-price-button');
                    
                    if (priceInput && titleElement) {
                        updateGamePriceInput.value = id;
                        deleteGamePriceInput.value = id;
                        priceInput.value = price;
                        priceInput.classList.remove('bg-gray-300');
                        priceInput.disabled = false;
                        priceTypeElement.textContent = 'Per ' + priceType;
                        titleElement.textContent = 'Tarif Bermain ' + name;
                        deleteButton.disabled = false;
                        deleteButton.classList.remove('bg-red-900');
                        deleteButton.classList.remove('cursor-not-allowed');
                        deleteButton.classList.add('bg-red-600');
                        deleteButton.classList.add('hover:bg-red-700');
                        updateButton.disabled = false;
                        updateButton.classList.remove('bg-blue-900');
                        updateButton.classList.remove('cursor-not-allowed');
                        updateButton.classList.add('bg-blue-600');
                        updateButton.classList.add('hover:bg-blue-700');
                    }
                });
            });
        });
    </script>
@endsection