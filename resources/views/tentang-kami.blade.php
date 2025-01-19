@extends('layouts.app')
@section('content')
    <!-- About Section Start -->
    <section id="tentang-kami" class="pt-36 pb-16 bg-slate-100">
        <div class="container pt-8">
            <div class="flex flex-col-reverse lg:flex-row lg:items-center">
                <!-- Teks -->
                <div class="w-full px-4 mb-10 lg:mb-0 lg:w-1/2">
                    <h4 class="font-bold uppercase text-lg mb-3">
                        Apa itu Artificial Intelligence <span id="typewriter" class="text-primary"></span>?
                    </h4>
                    {{-- <h4 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl">
                        Pusat Studi <span id="typewriter" class="text-blue-600"></span>
                    </h4> --}}
                    <p class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                        Artificial Intelligence Research Center Unsulbar adalah pusat inovasi dan penelitian di bidang kecerdasan buatan (AI) yang
                        berada di bawah naungan Universitas Sulawesi Barat. Kami berkomitmen untuk mendukung pengembangan teknologi AI yang
                        berbasis budaya lokal serta memberikan solusi untuk tantangan lokal, nasional, dan global di era Revolusi Industri 4.0
                        dan Society 5.0.
                    </p>
                    <h4 class="font-bold uppercase text-lg mb-3 mt-5">
                        Apa yang kami lakukan?
                    </h4>
                    <div class="px-0">
                        <li class="font-medium text-base text-secondary max-w-xl lg:text-lg" style="list-style-type: none;">
                            Kami mengadakan pelatihan, penelitian, dan pengembangan solusi berbasis AI untuk mendukung kebutuhan
                            lokal di berbagai sektor, serta menyediakan layanan konsultasi bagi pemerintah, industri, dan akademisi atau proyek
                            lainnya.
                        </li>
                        {{-- <li class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae excepturi possimus, eum veniam
                            voluptatem.
                        </li> --}}
                    </div>
                </div>

                <!-- Gambar -->
                <div class="w-full px-4 lg:w-1/2 flex justify-center mb-10 lg:mb-0">
                    {{-- <img src="https://picsum.photos/350/400?random=2" alt="Gambar 1" class="h-auto rounded-lg" /> --}}
                    <img src="{{ asset('img/Logo.png') }}" alt="Gambar 1" class="h-auto w-1/2 rounded-lg" />
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <section id="tentang-kami" class="pt-18 pb-32">
        <div class="container pt-10">
            <div class="flex flex-col lg:flex-row lg:items-center">
                <!-- Gambar -->
                <div class="w-full px-4 lg:w-1/2 flex justify-center mb-10 lg:mb-0">
                    {{-- <img src="https://picsum.photos/350/400?random=1" alt="Gambar 1" class="h-auto rounded-lg" /> --}}
                    <img src="{{ asset('img/Logo4.png') }}" alt="Gambar 1" class="h-auto w-full rounded-lg" />
                </div>

                <!-- Teks -->
                <div class="w-full px-4 lg:w-1/2">
                    <h4 class="font-bold uppercase text-primary text-lg mb-3">
                        Visi & Misi
                    </h4>
                    <h4 class="font-bold text-primary text-xl mb-5 max-w-md lg:text-2xl">
                        Artificial Intelligence Research Center
                    </h4>
                    <h4 class="font-bold uppercase text-primary text-lg">
                        Visi
                    </h4>
                    <li class="font-medium text-base text-secondary max-w-xl lg:text-lg" style="list-style-type: none;">
                        Menjadi pusat unggulan dalam pengembangan kecerdasan buatan untuk mendukung inovasi teknologi guna
                        memberikan solusi
                        nyata terhadap permasalahan lokal, nasional, dan global.
                    </li>
                    <h4 class="font-bold uppercase text-primary text-lg mt-3">
                        Misi
                    </h4>
                    <li class="mt-2 font-medium text-base text-secondary max-w-xl lg:text-lg" style="list-style-type: none;">
                        <p class="font-bold text-blue-500">
                            Pendidikan
                        </p>
                        Menyelenggarakan program pendidikan dan pelatihan di bidang kecerdasan buatan untuk menghasilkan
                        sumber daya manusia
                        yang kompeten, kreatif, dan inovatif.
                    </li>
                    <li class="mt-2 font-medium text-base text-secondary max-w-xl lg:text-lg" style="list-style-type: none;">
                        <p class="font-bold  text-blue-500">
                            Penelitian dan Inovasi
                        </p>
                        Mengembangkan ilmu pengetahuan dan teknologi di bidang kecerdasan buatan yang relevan dengan
                        kebutuhan masyarakat lokal,
                        nasional, dan global, serta mendorong inovasi berbasis budaya di Sulawesi Barat.
                    </li>
                    <li class="mt-2 font-medium text-base text-secondary max-w-xl lg:text-lg" style="list-style-type: none;">
                        <p class="font-bold  text-blue-500">
                            Pemanfaatan Teknologi
                        </p>
                        Mengaplikasikan teknologi kecerdasan buatan untuk meningkatkan kesejahteraan masyarakat, memperkuat
                        sektor ekonomi, dan
                        menjaga keberlanjutan lingkungan.
                    </li>
                    <li class="mt-2 font-medium text-base text-secondary max-w-xl lg:text-lg" style="list-style-type: none;">
                        <p class="font-bold  text-blue-500">
                            Kolaborasi dan Tata Kelola
                        </p>
                        Membangun jejaring kemitraan dengan lembaga pemerintah, industri, dan akademisi untuk mendukung
                        pengembangan teknologi
                        AI, serta menciptakan sistem tata kelola yang transparan, efektif, dan bertanggung jawab.
                    </li>
                </div>
            </div>
        </div>
    </section>

    <!-- Anggota Section Start -->
    <section id="anggota" class="pt-32 pb-16 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    {{-- <h4 class="font-semibold text-lg text-primary mb-2">Daftar</h4> --}}
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Anggota</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Tim Kami merupakan ahli dari bidang masing-masing
                     </p>
                </div>
            </div>

            <div class="w-full px-4 flex flex-wrap justify-center space-x-2 xl:w-10/12 xl:mx-auto">
                @forelse ($anggota as $ang)
                    <div class="mb-12 md:w-1/6 border border-slate-300">
                        <a href="{{ route('kinerja-anggota.show', $ang->id) }}">
                            <div class="rounded-md shadow-md overflow-hidden">
                                <img src="{{ asset('storage/' . $ang->kartu_anggota) }}" alt="" class="w-full">
                                {{-- @if ($ang->foto)
                                    <img src="{{ asset('storage/' . $ang->foto) }}" alt="" width="w-full">
                                @else
                                    <img src="{{ asset('img/Avatar-Profile-PNG-Free-Image.png') }}" alt=""
                                        width="w-full">
                                @endif --}}
                            </div>
                            {{-- <h3 class="font-semibold text-xl text-dark mt-5 mb-3 text-center">{{ $ang->nama }}</h3> --}}
                        </a>
                    </div>
                @empty
                    <p>Belum ada anggota yang terdaftar.</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Anggota Section End -->

    <section id="rekam-jejak" class="pt-32 pb-24 bg-slate-700">
        <div class="max-w-6xl mx-auto p-6 text-white">
            <h1 class="text-3xl text-white font-bold mb-10 text-center">
                Peta Jalan AIRC Unsulbar
            </h1>
            <div class="relative">
                <!-- Vertical Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 w-4 bg-gray-500 h-full">
                    <div class="absolute left-1/2 transform -translate-x-1/2 h-full" style="border-left: 2px dashed white;"></div>
                </div>
                <!-- Gambar di atas -->
                <img src="{{ asset('img/101.jpeg') }}" alt="Top Image"
                    class="absolute rounded-full -top-6 left-1/2 transform -translate-x-1/2 w-16 h-auto">
                
                <!-- Gambar di bawah -->
                <img src="{{ asset('img/100.jpeg') }}" alt="Bottom Image"
                    class="absolute rounded-full -bottom-14 left-1/2 transform -translate-x-1/2 w-16 h-auto">

                <!-- Timeline Start -->
                <div class="relative z-10 flex items-center mb-8 mr-16">
                    <div class="w-1/2 text-right pr-4 mt-12">
                        <p class="font-bold text-3xl">2023</p>
                        <p class="text-lg">
                            Pembentukan Artificial Intelligence Research Center atau Pusat Studi Artificial Intelligence Universitas Sulawesi Barat
                        </p>
                    </div>
                    <div class="w-8 h-8 -mt-2 bg-green-500 rounded-full border-2 border-white mx-auto"></div>
                    <div class="w-1/2"></div>
                </div>

                <!-- Timeline Item 2 -->
                <div class="relative z-10 flex items-center mb-8 ml-16">
                    <div class="w-1/2"></div>
                    <div class="w-8 h-8 bg-blue-500 rounded-full border-2 border-white mx-auto"></div>
                    <div class="w-1/2 pl-4">
                        <p class="font-bold text-3xl">2024</p>
                        <p class="text-lg">Pengembangan Sistem Pertanian berbasis Digital</p>
                    </div>
                </div>

                <!-- Timeline Item 3 -->
                <div class="relative z-10 flex items-center mb-8 mr-16">
                    <div class="w-1/2 text-right pr-4">
                        <p class="font-bold text-3xl">(New!) 2025</p>
                        <p class="text-lg">
                            Pengembangan Sistem Manajemen Sampah
                        </p>
                    </div>
                    <div class="w-8 h-8 bg-blue-500 rounded-full border-2 border-white mx-auto"></div>
                    <div class="w-1/2"></div>
                </div>

                <!-- Timeline Item 4 -->
                {{-- <div class="relative z-10 flex items-center mb-8">
                    <div class="w-1/2"></div>
                    <div class="w-8 h-8 bg-blue-500 rounded-full border-2 border-white mx-auto"></div>
                    <div class="w-1/2 pl-8">
                        <p class="font-bold text-3xl mt-7">2015</p>
                        <p class="text-lg">Model pendeteksi fraud transaksi kartu kredit</p>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>

    <section class="relative font-inter antialiased ">

        <main class="relative flex flex-col justify-center overflow-hidden">
            <div class="container -mb-18">
                <div class="w-full px-4">
                    <div class="max-w-xl mx-auto text-center mt-12">
                        {{-- <h4 class="font-semibold text-lg text-primary mb-2">Portofolio Kerja Sama & Training</h4> --}}
                        <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Kerja Sama Mitra</h2>
                        <p class="font-medium text-md text-secondary md:text-lg">
                            Kami telah bekerja sama dengan berbagai pihak
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-5xl mx-auto px-4 md:px-6 py-24">
                <div class="text-center">

                    <!-- Logo Carousel animation -->
                    <div x-data="{}" x-init="$nextTick(() => {
                        let ul = $refs.logos;
                        ul.insertAdjacentHTML('afterend', ul.outerHTML);
                        ul.nextSibling.setAttribute('aria-hidden', 'true');
                    })"
                        class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]">
                        <ul x-ref="logos"
                            class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll-right">
                            <li>
                                <img src="{{ asset('img/1.png') }}" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
                                <img src="{{ asset('img/2.png') }}" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
                                <img src="{{ asset('img/3.png') }}" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            {{-- <li>
                                <img src="https://picsum.photos/300/200?random=4" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
                                <img src="https://picsum.photos/300/200?random=5" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
                                <img src="https://picsum.photos/300/200?random=6" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li> --}}
                        </ul>
                    </div>
                    <!-- End: Logo Carousel animation -->

                </div>

            </div>
        </main>
    </section>

    <section class="relative font-inter antialiased ">

        <main class="relative flex flex-col justify-center bg-slate-100 overflow-hidden">
            <div class="container -mb-18">
                <div class="w-full px-4">
                    <div class="max-w-xl mx-auto text-center mt-12">
                        {{-- <h4 class="font-semibold text-lg text-primary mb-2">Portofolio Kerja Sama & Training</h4> --}}
                        <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Sarana & Pra-Sarana</h2>
                        <p class="font-medium text-md text-secondary md:text-lg">
                            Kami dilengkapi dengan sarana dan pra-sarana yang mendukung pengembangan artificial intelligence
                        </p>
                    </div>
                </div>
            </div>
            <div class="w-full max-w-5xl mx-auto px-4 md:px-6 py-24">
                <div class="text-center">

                    <!-- Logo Carousel animation -->
                    <div x-data="{}" x-init="$nextTick(() => {
                        let ul = $refs.logos;
                        ul.insertAdjacentHTML('afterend', ul.outerHTML);
                        ul.nextSibling.setAttribute('aria-hidden', 'true');
                    })"
                        class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]">
                        <ul x-ref="logos"
                            class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll-left">
                            <li>
                                <img src="{{ asset('img/41.png') }}" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
                                <img src="{{ asset('img/41.png') }}" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
                                <img src="{{ asset('img/51.png') }}" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
                                <img src="{{ asset('img/61.png') }}" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
                                <img src="{{ asset('img/71.png') }}" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
                                <img src="{{ asset('img/81.png') }}" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                        </ul>
                    </div>
                    <!-- End: Logo Carousel animation -->

                </div>

            </div>
        </main>
    </section>

    <!-- Keunggulan Section Start -->
    <section id="riset-unggulan" class="pt-24 pb-16">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Riset Unggulan</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Pusat Studi Artificial Intelligence Unsulbar berfokus pada beberapa bidang, diantaranya sebagai berikut:
                    </p>
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/4">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/7.png') }}" alt="Platform DATAU" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Kebencanaan
                    </h3>
                    <p class="font-medium text-base text-secondary">Bidang kajian yang bertujuan untuk menyelidiki manajemen bencana secara holistik, mulai dari tahap pra-bencana, selama
                    bencana terjadi, hingga pasca bencana.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/4">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/8.png') }}" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Kesehatan</h3>
                    <p class="font-medium text-base text-secondary">Kajian ini mencakup aspek kesehatan masyarakat secara menyeluruh, termasuk promosi kesehatan, pencegahan penyakit,
                    pengendalian penyakit, dan manajemen kesehatan masyarakat.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/4">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/9.png') }}" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Pertanian Berkelanjutan</h3>
                    <p class="font-medium text-base text-secondary">Penelitian ini berkaitan dengan konsep pertanian berkelanjutan, dengan tujuan meningkatkan produktivitas hasil pertanian
                    dan menjaga keberlanjutan lingkungan.
                    </p>
                </div>
                <div class="mb-12 p-4 md:w-1/4">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/10.png') }}" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Transportasi</h3>
                    <p class="font-medium text-base text-secondary">Bidang kajian ini memanfaatkan teknologi untuk pemantauan, manajemen, dan pengendalian sistem transportasi.
                    </p>
                </div>
                <div class="mb-12 p-4 md:w-1/4">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/11.png') }}" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Antropolinguistik & Kebudayaan</h3>
                    <p class="font-medium text-base text-secondary">Kajian ini menggali hubungan antara bahasa, budaya, dan masyarakat dengan tujuan menghasilkan
                    produk teknologi yang relevan.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/4">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/12.png') }}" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Smart Sistem</h3>
                    <p class="font-medium text-base text-secondary">Fokus pada pengembangan sistem-sistem cerdas yang dapat memberikan solusi inovatif dalam berbagai konteks.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/4">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/13.png') }}" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Algoritma & Komputasi</h3>
                    <p class="font-medium text-base text-secondary">Penelitian ini mengeksplorasi pengembangan algoritma dan komputasi yang mendorong kemajuan dalam berbagai aplikasi
                    kecerdasan buatan.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/4">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/14.png') }}" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Software Development</h3>
                    <p class="font-medium text-base text-secondary">Kajian ini berkaitan dengan pengembangan perangkat lunak yang mendukung berbagai aplikasi kecerdasan buatan</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Keunggulan Section End -->
    {{-- <section class="pt-32 pb-16">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-10">
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Sarana & Pra-Sarana</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, aut.
                    </p>
                </div>
            </div>
            <div class="overflow-x-auto p-10 scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200">
                <div class="flex">
                    <div class="flex-none w-full md:w-1/3 p-2">
                        <div class="bg-slate-100 p-5">
                            <img src="https://picsum.photos/300/200?random=1" alt="Random Image from Lorem Picsum"
                                class="w-full">
                            <p class="pt-3">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-2">
                        <div class="bg-slate-100 p-5">
                            <img src="https://picsum.photos/300/200?random=2" alt="Random Image from Lorem Picsum"
                                class="w-full">
                            <p class="pt-3">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-2">
                        <div class="bg-slate-100 p-5">
                            <img src="https://picsum.photos/300/200?random=3" alt="Random Image from Lorem Picsum"
                                class="w-full">
                            <p class="pt-3">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-2">
                        <div class="bg-slate-100 p-5">
                            <img src="https://picsum.photos/300/200?random=4" alt="Random Image from Lorem Picsum"
                                class="w-full">
                            <p class="pt-3">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-2">
                        <div class="bg-slate-100 p-5">
                            <img src="https://picsum.photos/300/200?random=5" alt="Random Image from Lorem Picsum"
                                class="w-full">
                            <p class="pt-3">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-2">
                        <div class="bg-slate-100 p-5">
                            <img src="https://picsum.photos/300/200?random=6" alt="Random Image from Lorem Picsum"
                                class="w-full">
                            <p class="pt-3">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-2">
                        <div class="bg-slate-100 p-5">
                            <img src="https://picsum.photos/300/200?random=7" alt="Random Image from Lorem Picsum"
                                class="w-full">
                            <p class="pt-3">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                        </div>
                    </div>
                    <div class="flex-none w-full md:w-1/3 p-2">
                        <div class="bg-slate-100 p-5">
                            <img src="https://picsum.photos/300/200?random=8" alt="Random Image from Lorem Picsum"
                                class="w-full">
                            <p class="pt-3">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
@section('scripts')
    <script>
        const typewriter = new Typewriter('#typewriter', {
            loop: true,
            delay: 75,
        });

        typewriter
            .typeString('Research Center')
            .pauseFor(1000)
            .deleteAll()
            .start();
    </script>
@endsection
