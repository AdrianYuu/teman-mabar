<nav class="bg-white border-gray-200 dark:bg-gray-900">
	<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
		{{-- Logo --}}
		<a href="{{ route('indexPage') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
		<img src="{{ asset('assets/images/logo.png') }}" class="h-8" alt="TemanMabar Logo" />
		<span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">TemanMabar</span>
		</a>
		{{-- Profile Dropdown --}}
		<div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
			@auth
				<div class="flex items-center">
					<span>{{ Auth::user()->coin }}</span>
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
				<button type="button" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
				<span class="sr-only">Open user menu</span>
				<img class="w-8 h-8 object-fill rounded-full border-2 border-gray-600 " src="{{ Auth::user()->profile_picture_url ? Auth::user()->profile_picture_url : asset('assets/images/Profile-icon.jpg') }}" alt="user photo">
				</button>
				<div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
					<div class="px-4 py-3">
						<span class="block text-sm text-gray-900 dark:text-white">{{ Auth::user()->name }}</span>
						<span class="block text-sm text-gray-500 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
					</div>
					<ul class="py-2" aria-labelledby="user-menu-button">
						<li>
							<a href="{{ route('profilePage') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile Saya</a>
						</li>
						<li>
							<a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Isi Saldo</a>
						</li>
						<form method="POST" action="{{ route('logout') }}">
							@csrf
							<button class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white w-full text-left">Keluar</button>
						</form>
					</ul>
				</div>
				<button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-user" aria-expanded="false">
					<span class="sr-only">Open main menu</span>
					<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
						<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
					</svg>
				</button>
			@endauth
			@guest
				<a href="{{ route('loginPage') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mr-4">Login</a>
				<a href="{{ route('registerPage') }}" class="text-white bg-gray-500 hover:bg-gray-600 focus:ring-2 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-400 dark:hover:bg-gray-700 focus:outline-none dark:focus:ring-gray-800">Register</a>
			@endguest
		</div>
		<!-- Main Navbar -->
		<div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
			<ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700 text-lg">
				<li>
					<a href="{{ route('indexPage') }}" class="block py-2 px-3 text-black rounded md:bg-transparent hover:text-blue-700 md:p-0 md:dark:text-blue-500 {{ Request::is('/') ? 'text-blue-700' : ''}}" aria-current="page">Beranda</a>
				</li>
				<li>
					<a href="#" class="block py-2 px-3 text-black rounded md:bg-transparent hover:text-blue-700 md:p-0 md:dark:text-blue-500 {{ Request::is('/?') ? 'text-blue-700' : ''}}" aria-current="page">Cari Teman Game</a>
				</li>
				<li>
					<a href="#" class="block py-2 px-3 text-black rounded md:bg-transparent hover:text-blue-700 md:p-0 md:dark:text-blue-500 {{ Request::is('/?') ? 'text-blue-700' : ''}}" aria-current="page">Cari Kompetisi</a>
				</li>
				<li>
					<a href="#" class="block py-2 px-3 text-black rounded md:bg-transparent hover:text-blue-700 md:p-0 md:dark:text-blue-500 {{ Request::is('/?') ? 'text-blue-700' : ''}}" aria-current="page">Forum</a>
				</li>
			</ul>
		</div>
	</div>
</nav>