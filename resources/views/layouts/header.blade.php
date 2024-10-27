<!-- Header Start -->
<header class="bg-transparent absolute top-0 left-0 w-full flex items-center z-10">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <div class="px-4">
                <a href="#home" class="font-bold text-3xl text-primary block py-6">Pusat Studi AI</a>
            </div>
            <div class="flex items-center px-4">
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out "></span>
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                </button>

                <a href="#login" class="lg:hidden text-base rounded-full bg-primary text-white py-2 px-4 mx-12">
                    Masuk
                </a>

                <nav id="nav-menu"
                    class="hidden absolute py-5 bg-white shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                    <ul class="block lg:flex space-x-4">
                        <li class="group">
                            <a href="#home"
                                class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Beranda</a>
                        </li>
                        <li class="group">
                            <a href="#about"
                                class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">Tentang Kami</a>
                        </li>
                        <li class="relative group">
                            <a href="#workshops" class="text-base text-dark py-2 mx-8 flex group-hover:text-primary">
                                Workshops
                            </a>
                            <ul
                                class="absolute left-0 hidden mt-2 bg-white border border-gray-300 rounded shadow-lg group-hover:block group-focus:block">
                                <li>
                                    <a href="#workshop1" class="block px-4 py-2 text-dark hover:bg-gray-100">Workshop
                                        1</a>
                                </li>
                                <li>
                                    <a href="#workshop2" class="block px-4 py-2 text-dark hover:bg-gray-100">Workshop
                                        2</a>
                                </li>
                                <li>
                                    <a href="#workshop3" class="block px-4 py-2 text-dark hover:bg-gray-100">Workshop
                                        3</a>
                                </li>
                            </ul>
                        </li>
                        <li class="group">
                            <a href="#login"
                                class="text-base hidden lg:block rounded-full bg-primary px-8 text-white py-2 mx-8 flex group-hover:bg-blue-400">Login</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
