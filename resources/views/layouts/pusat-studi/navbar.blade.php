<!-- Header Start -->
<header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <!-- Logo -->
            <div class="px-4">
                <a href="#home" class="font-bold text-3xl text-primary block py-6">
                    Pusat<span class="text-primary">Studi AI</span>
                </a>
            </div>

            <!-- Navigation -->
            <div class="flex items-center px-4">
                <!-- Hamburger Button -->
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                </button>

                <!-- Login Button (Mobile) -->
                <a href="{{ url('login') }}"
                    class="lg:hidden text-base rounded-full bg-primary text-white py-2 px-4 mx-12">
                    Masuk
                </a>

                <!-- Navigation Menu -->
                <nav id="nav-menu"
                    class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none nav-menu">
                    <ul class="block lg:flex">
                        <!-- Beranda -->
                        <li class="group">
                            <a href="{{ url('pusat-studi/artificial-intelligance') }}"
                                class="text-base text-dark py-2 mx-8 flex group-hover:text-primary {{ Request::is('pusat-studi/artificial-intelligance') ? 'text-primary' : '' }}">
                                Beranda
                            </a>
                        </li>

                        <!-- Tentang Kami -->
                        <li class="group">
                            <a href="{{ url('pusat-studi/tentang-kami') }}"
                                class="text-base text-dark py-2 mx-8 flex group-hover:text-primary {{ Request::is('pusat-studi/tentang-kami') ? 'text-primary' : '' }}">
                                Tentang Kami
                            </a>
                        </li>

                        <!-- Sumber Daya Dropdown -->
                        <li class="group relative">
                            <button id="dropdownButtonSumberDaya" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary"
                                aria-expanded="false">
                                Sumber Daya
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 mt-1 mx-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <ul id="dropdownMenuSumberDaya"
                                class="relative lg:absolute hidden lg:group-hover:block bg-white rounded-lg p-3 max-w-[250px]">
                                <li>
                                    <a href="#statistik" class="text-base text-dark py-2 px-4 block hover:bg-gray-100">
                                        Anggota
                                    </a>
                                </li>
                                <li>
                                    <a href="#data-publikasi"
                                        class="text-base text-dark py-2 px-4 block hover:bg-gray-100">
                                        Sarana & Prasarana
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Artikel -->
                        <li class="group">
                            <a href="{{ url('pusat-studi/artikel') }}"
                                class="text-base text-dark py-2 mx-8 flex group-hover:text-primary {{ Request::is('pusat-studi/artikel') ? 'text-primary' : '' }}">
                                Artikel
                            </a>
                        </li>

                        <!-- Data Dropdown -->
                        <li class="group relative">
                            <button id="dropdownButtonData" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary"
                                aria-expanded="false">
                                Data
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 mt-1 mx-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <ul id="dropdownMenuData"
                                class="relative lg:absolute lg:group-hover:block hidden bg-white rounded-lg p-3 max-w-[250px]">
                                <li>
                                    <a href="{{ url('pusat-studi/data/publikasi') }}"
                                        class="text-base text-dark py-2 px-4 block hover:bg-gray-100">
                                        Publikasi
                                    </a>
                                </li>
                                <li>
                                    <a href="#data-publikasi"
                                        class="text-base text-dark py-2 px-4 block hover:bg-gray-100">
                                        Penelitian
                                    </a>
                                </li>
                                <li>
                                    <a href="#data-publikasi"
                                        class="text-base text-dark py-2 px-4 block hover:bg-gray-100">
                                        Pengabdian
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Informasi Dropdown -->
                        <li class="group relative">
                            <button id="dropdownButtonInformasi" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary"
                                aria-expanded="false">
                                Informasi
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 mt-1 mx-1" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <ul id="dropdownMenuInformasi"
                                class="relative lg:absolute hidden lg:group-hover:block bg-white rounded-lg p-3 max-w-[250px]">
                                <li>
                                    <a href="{{ url('pusat-studi/kinerja-anggota') }}"
                                        class="text-base text-dark py-2 px-4 block hover:bg-gray-100">
                                        Kinerja Anggota
                                    </a>
                                </li>
                                <li>
                                    <a href="#statistik" class="text-base text-dark py-2 px-4 block hover:bg-gray-100">
                                        Upload PDF
                                    </a>
                                </li>
                                <li>
                                    <a href="#data-publikasi"
                                        class="text-base text-dark py-2 px-4 block hover:bg-gray-100">
                                        Kontak
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- Login Button (Desktop) -->
                        <li class="group">
                            <a href="{{ url('login') }}"
                                class="text-base hidden lg:block rounded-full bg-primary px-8 text-white py-2 mx-8 flex group-hover:bg-blue-400">
                                Masuk
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
