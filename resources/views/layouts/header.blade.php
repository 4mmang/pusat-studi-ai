<!-- Header Start -->
<header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <div class="px-4">
                <a href="#home" class="font-bold text-3xl text-primary block py-6"><span
                        class="text-primary">LPPM</span></a>
            </div>
            <div class="flex items-center px-4">
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out "></span>
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                </button>

                {{-- <a href="{{ url('login') }}"
                    class="lg:hidden text-base rounded-full bg-primary text-white py-2 px-4 mx-12">
                    Masuk
                </a> --}}

                <nav id="nav-menu"
                    class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none nav-menu">
                    <ul class="block lg:flex">
                        <li class="group">
                            <a href="{{ url('/') }}"
                                class="text-base text-dark py-2 mx-8 flex group-hover:text-primary {{ Request::is('/') ? 'text-primary' : '' }}">Beranda</a>
                        </li>
                        <li class="group">
                            <a href="{{ url('tentang-kami') }}"
                                class="text-base text-dark py-2 mx-8 flex group-hover:text-primary {{ Request::is('tentang-kami') ? 'text-primary' : '' }}">Tentang
                                Kami</a>
                        </li>
                        <li class="group relative">
                            <a href="#" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Pusat
                                Studi
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 mt-1 mx-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul
                                class="absolute hidden group-hover:block bg-white shadow-lg rounded-lg p-3 max-w-[250px]">
                                <li>
                                    <a href="{{ url('pusat-studi/artificial-intelligance') }}"
                                        class="text-base text-dark py-2 px-4 block hover:bg-gray-100">Pusat Studi A</a>
                                </li>
                                <li>
                                    <a href="{{ url('pusat-studi/artificial-intelligance') }}"
                                        class="text-base text-dark py-2 px-4 block hover:bg-gray-100">Pusat Studi B</a>
                                </li>
                                <li>
                                    <a href="{{ url('pusat-studi/artificial-intelligance') }}"
                                        class="text-base text-dark py-2 px-4 block hover:bg-gray-100">Pusat Studi C</a>
                                </li>
                            </ul>
                        </li>

                        <li class="group">
                            <a href="{{ url('berita') }}"
                                class="text-base text-dark py-2 mx-8 flex group-hover:text-primary {{ Request::is('berita') ? 'text-primary' : '' }}">Berita</a>
                        </li>
                        <li class="group">
                            <a href="{{ url('statistik') }}"
                                class="text-base text-dark py-2 mx-8 flex group-hover:text-primary {{ Request::is('statistik') ? 'text-primary' : '' }}">Statistik</a>
                        </li>

                        <li class="group relative">
                            <a href="#" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Akses
                                Cepat
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 mt-1 mx-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                            <ul
                                class="absolute hidden group-hover:block bg-white shadow-lg rounded-lg p-3 max-w-[250px]">
                                <li>
                                    <a href="#statistik"
                                        class="text-base text-dark py-2 px-4 block hover:bg-gray-100">Pusdata
                                        Unsulbar</a>
                                </li>
                                <li>
                                    <a href="#data-publikasi"
                                        class="text-base text-dark py-2 px-4 block hover:bg-gray-100">Unsulbar News</a>
                                </li>
                            </ul>
                        </li>
                        <li class="group">
                            <a href=""
                                class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Kontak</a>
                        </li>
                        {{-- <li class="group">
                            <a href="{{ url('login') }}"
                                class="text-base hidden lg:block rounded-full bg-primary px-8 text-white py-2 mx-8 flex group-hover:bg-blue-400">Masuk</a>
                        </li> --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
