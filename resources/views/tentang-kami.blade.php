@extends('layouts.app')
@section('content')
    <!-- About Section Start -->
    <section id="tentang-kami" class="pt-36 pb-16 bg-slate-100">
        <div class="container pt-8">
            <div class="flex flex-col-reverse lg:flex-row lg:items-center">
                <!-- Teks -->
                <div class="w-full px-4 mb-10 lg:mb-0 lg:w-1/2">
                    <h4 class="font-bold uppercase text-lg mb-3">
                        Apa itu Pusat Studi <span id="typewriter" class="text-blue-600"></span>?
                    </h4>
                    {{-- <h4 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl">
                        Pusat Studi <span id="typewriter" class="text-blue-600"></span>
                    </h4> --}}
                    <p class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                        Indobot Academy adalah penyedia layanan edukasi berupa kelas online, training, workshop, pelatihan
                        dan diklat untuk
                        meningkatkan skill SDM di era Revolusi Industri 4.0 guna memajukan teknologi digital masa kini.
                    </p>
                    <h4 class="font-bold uppercase text-lg mb-3 mt-5">
                        Apa saja produk kami?
                    </h4>
                    <div class="px-5">
                        <li class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae excepturi possimus, eum veniam
                            voluptatem
                            aperiam accusamus quasi! Vero ipsum, minus incidunt facilis impedit, corrupti odit tempore
                            obcaecati
                            vel
                            veritatis sequi.
                        </li>
                        <li class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae excepturi possimus, eum veniam
                            voluptatem.
                        </li>
                    </div>
                </div>

                <!-- Gambar -->
                <div class="w-full px-4 lg:w-1/2 flex justify-center mb-8 lg:mb-0">
                    {{-- <img src="https://picsum.photos/350/400?random=2" alt="Gambar 1" class="h-auto rounded-lg" /> --}}
                    <img src="{{ asset('img/Logo.jpg') }}" alt="Gambar 1" class="h-auto rounded-lg" />
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <section id="tentang-kami" class="pt-18 pb-32">
        <div class="container pt-10">
            <div class="flex flex-col lg:flex-row lg:items-center">
                <!-- Gambar -->
                <div class="w-full px-4 lg:w-1/2 flex justify-center mb-8 lg:mb-0">
                    {{-- <img src="https://picsum.photos/350/400?random=1" alt="Gambar 1" class="h-auto rounded-lg" /> --}}
                    <img src="{{ asset('img/Logo.jpg') }}" alt="Gambar 1" class="h-auto rounded-lg" />
                </div>

                <!-- Teks -->
                <div class="w-full px-4 lg:w-1/2">
                    <h4 class="font-bold uppercase text-primary text-lg mb-3">
                        Visi & Misi
                    </h4>
                    <h4 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl">
                        Pusat Studi Artificial Intelligance
                    </h4>
                    <h4 class="font-bold uppercase text-primary text-lg">
                        Visi
                    </h4>
                    <li class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae excepturi possimus, eum veniam
                        voluptatem
                        aperiam accusamus quasi! Vero ipsum, minus incidunt facilis impedit, corrupti odit tempore obcaecati
                        vel
                        veritatis sequi.
                    </li>
                    <li class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae excepturi possimus, eum veniam
                        voluptatem.
                    </li>
                    <h4 class="font-bold uppercase text-primary text-lg mt-3">
                        Misi
                    </h4>
                    <li class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae excepturi possimus, eum veniam
                        voluptatem
                        aperiam accusamus quasi! Vero ipsum, minus incidunt facilis impedit, corrupti odit tempore obcaecati
                        vel
                        veritatis sequi.
                    </li>
                    <li class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae excepturi possimus, eum veniam
                        voluptatem.
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
                    <h4 class="font-semibold text-lg text-primary mb-2">Daftar</h4>
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Anggota</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, aut.
                    </p>
                </div>
            </div>

            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                @forelse ($anggota as $ang)
                    <div class="mb-12 p-4 md:w-1/3 border border-slate-300">
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

    <section class="relative font-inter antialiased ">

        <main class="relative min-h-screen flex flex-col justify-center overflow-hidden">
            <div class="container -mb-18">
                <div class="w-full px-4">
                    <div class="max-w-xl mx-auto text-center">
                        {{-- <h4 class="font-semibold text-lg text-primary mb-2">Portofolio Kerja Sama & Training</h4> --}}
                        <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Kerja Sama Mitra</h2>
                        <p class="font-medium text-md text-secondary md:text-lg">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, aut.
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
                                <img src="https://picsum.photos/300/200?random=1" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
                                <img src="https://picsum.photos/300/200?random=2" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
                                <img src="https://picsum.photos/300/200?random=3" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
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
                            </li>
                        </ul>
                    </div>
                    <!-- End: Logo Carousel animation -->

                </div>

            </div>
        </main>
    </section>

    <section class="relative font-inter antialiased ">
    
        <main class="relative min-h-screen flex flex-col justify-center bg-slate-100 overflow-hidden">
            <div class="container -mb-18">
                <div class="w-full px-4">
                    <div class="max-w-xl mx-auto text-center">
                        {{-- <h4 class="font-semibold text-lg text-primary mb-2">Portofolio Kerja Sama & Training</h4> --}}
                        <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Sarana & Pra-Sarana</h2>
                        <p class="font-medium text-md text-secondary md:text-lg">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, aut.
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
                                <img src="https://picsum.photos/300/200?random=1" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
                                <img src="https://picsum.photos/300/200?random=2" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
                                <img src="https://picsum.photos/300/200?random=3" alt="Random Image from Lorem Picsum"
                                    width="w-full">
                            </li>
                            <li>
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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, aut.
                    </p>
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/3">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Sekali-Bayar.png') }}" alt="Platform DATAU" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Bagaimana intervensi dalam penanganan Stunting?</h3>
                    <p class="font-medium text-base text-secondary">Lorem ipsum, dolor sit amet consectetur adipisicing
                        elit. Quis quasi sit nihil. Necessitatibus deleniti omnis debitis ab.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/3">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Mentoring.png') }}" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Metode Mentoring</h3>
                    <p class="font-medium text-base text-secondary">Lorem ipsum dolor sit amet consectetur, adipisicing
                        elit. Odit, sapiente?</p>
                </div>
                <div class="mb-12 p-4 md:w-1/3">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Awam-IT.png') }}" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Hands On Praktikum</h3>
                    <p class="font-medium text-base text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing.
                    </p>
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
            .typeString('Artificial Intelligence')
            .pauseFor(1000)
            .deleteAll()
            .start();
    </script>
@endsection
