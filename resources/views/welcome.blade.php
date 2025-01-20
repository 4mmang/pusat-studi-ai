@extends('layouts.app')
@section('content')
    <!-- Hero Section Start -->
    <section id="beranda" class="pt-36 pb-28 bg-slate-100">
        {{-- <div class="container">
            <div class="flex flex-wrap lg:flex-nowrap">
                <div class="w-full self-end px-4 -mt-10">
                    <div class="relative w-full max-w-4xl mx-auto mt-10 overflow-hidden" id="slider-container">
                        <div class="flex transition-transform duration-300" id="slides">
                            <div class="min-w-full">
                                <img src="https://picsum.photos/800/400?random=1" alt="Gambar 1"
                                    class="w-full h-auto rounded-lg" />
                            </div>
                            <div class="min-w-full">
                                <img src="https://picsum.photos/800/400?random=2" alt="Gambar 2"
                                    class="w-full h-auto rounded-lg" />
                            </div>
                            <div class="min-w-full">
                                <img src="https://picsum.photos/800/400?random=3" alt="Gambar 3"
                                    class="w-full h-auto rounded-lg" />
                            </div>
                        </div>
                        <!-- Indikator Bulat -->
                        <div class="flex justify-center mt-4 space-x-2" id="indicators">
                            <div class="h-2 w-2 bg-gray-800 rounded-full" data-slide="0"></div>
                            <div class="h-2 w-2 bg-gray-800 rounded-full" data-slide="1"></div>
                            <div class="h-2 w-2 bg-gray-800 rounded-full" data-slide="2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="container">
            <div class="flex flex-wrap pt-16">
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold text-dark text-3xl mb-1 max-w-md lg:text-4xl">Artificial Intelligence
                    </h4>
                    <h5 class="text-3xl lg:text-4xl font-bold mb-5">
                        <span id="typewriter" class="text-primary"></span>
                    </h5>

                    <p class="font-medium text-base text-secondary max-w-xl lg:text-lg">Artificial Intelligence Research
                        Center Universitas Sulawesi Barat (AIRC Unsulbar) resmi didirikan pada tanggal 7 Juni
                        2024 berdasarkan Surat Keputusan Rektor Universitas Sulawesi Barat Nomor Surat: <span
                            class="font-bold">1959/UN55/HK.03/2024 </span>. Kehadirannya menjadi
                        langkah strategis dalam memajukan penelitian dan pengembangan teknologi kecerdasan buatan (AI) di
                        Sulawesi Barat.</p>
                </div>

                <div class="w-full px-4 lg:w-1/2 flex justify-center">
                    {{-- <img src="https://picsum.photos/350/400?random=1" alt="Gambar 1" class="h-auto rounded-lg" /> --}}
                    <img src="{{ asset('img/Logo3.png') }}" alt="Gambar 1" class="h-auto w-1/2 rounded-lg" />
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Hero Section Start -->
    <section id="beranda" class="pt-36 pb-32">
        <div class="container">
            <div class="flex flex-wrap lg:flex-nowrap text-center">
                <div class="w-full self-center px-4">
                    <h4 class="font-semibold text-3xl text-primary mb-2">Event</h4>
                    <h2 class="font-medium text-slate-500 text-lg mb-5 lg:text-2xl">
                        <span class="text-dark">Event yang diselenggarakan oleh Pusat Studi Artificial Intelligence</span>
                    </h2>
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                @forelse ($events as $event)
                    <div class="mb-12 p-4 md:w-1/3">
                        <div class="rounded-md overflow-hidden flex justify-center">
                            <img src="{{ asset('storage/' . $event->poster) }}" class="h-auto rounded-xl"
                                alt="Platform DATAU" width="w-full">
                        </div>
                        <h3 class="font-semibold text-md flex justify-center text-dark mt-2 mb-3">
                            <a href="{{ $event->link_pendaftaran }}" target="_blank" class="p-3 px-5 py-3 bg-primary text-white rounded-full">Daftar Sekarang</a>
                        </h3>
                    </div>
                @empty
                    <p>Belum ada</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Keunggulan Section Start -->
    <section id="keunggulan" class="pt-24 pb-16 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-3xl text-primary mb-2">Keunggulan Kami</h4>
                    {{-- <p class="font-medium text-md text-secondary md:text-lg">
                        
                    </p> --}}
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/3">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/5.png') }}" alt="Platform DATAU" class="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Riset Berorientasi Solusi Lokal</h3>
                    <p class="font-medium text-base text-secondary">Pusat Studi AI Unsulbar fokus pada penelitian yang
                        memberikan dampak nyata, terutama untuk solusi yang relevan dengan
                        kebutuhan masyarakat lokal. Contohnya termasuk optimasi jalur evakuasi bencana, deteksi cacat biji
                        kopi, dan pemetaan
                        hasil pertanian berbasis AI.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/3">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/4.png') }}" alt="" class="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Kolaborasi dengan Industri dan Pemerintah</h3>
                    <p class="font-medium text-base text-secondary">Pusat Studi AI Unsulbar aktif menjalin kemitraan dengan
                        berbagai sektor industri dan pemerintah untuk menciptakan solusi
                        berbasis AI yang inovatif. Kolaborasi ini bertujuan untuk menjawab tantangan nyata di masyarakat,
                        seperti pengelolaan
                        sumber daya, transportasi, dan edukasi.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/3">
                    <div class="rounded-md shadow-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/6.png') }}" alt="" class="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Akses ke Teknologi Terkini</h3>
                    <p class="font-medium text-base text-secondary">Peserta memiliki kesempatan untuk menggunakan perangkat
                        keras dan perangkat lunak AI terbaru, termasuk GPU canggih,
                        framework deep learning mutakhir, dan alat visualisasi data, yang semuanya mendukung eksperimen dan
                        inovasi berbasis
                        kecerdasan buatan.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Keunggulan Section End -->

    <!-- Reviews Section Start -->
    <section class="bg-slate-100">
        <div class="mx-auto max-w-screen-xl px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
            <h2 class="text-center text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                Apa Kata Mereka?
            </h2>

            <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-3 md:gap-8">
                <blockquote class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
                    <div class="flex items-center gap-4">
                        <img alt=""
                            src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                            class="size-14 rounded-full object-cover" />

                        <div>
                            <div class="flex justify-center gap-0.5 text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>

                            <p class="mt-0.5 text-lg font-medium text-gray-900">Paul Starr</p>
                        </div>
                    </div>

                    <p class="mt-4 text-gray-700">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa sit rerum incidunt, a
                        consequuntur recusandae ab saepe illo est quia obcaecati neque quibusdam eius accusamus
                        error officiis atque voluptates magnam!
                    </p>
                </blockquote>

                <blockquote class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
                    <div class="flex items-center gap-4">
                        <img alt=""
                            src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                            class="size-14 rounded-full object-cover" />

                        <div>
                            <div class="flex justify-center gap-0.5 text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>

                            <p class="mt-0.5 text-lg font-medium text-gray-900">Paul Starr</p>
                        </div>
                    </div>

                    <p class="mt-4 text-gray-700">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa sit rerum incidunt, a
                        consequuntur recusandae ab saepe illo est quia obcaecati neque quibusdam eius accusamus
                        error officiis atque voluptates magnam!
                    </p>
                </blockquote>

                <blockquote class="rounded-lg bg-gray-50 p-6 shadow-sm sm:p-8">
                    <div class="flex items-center gap-4">
                        <img alt=""
                            src="https://images.unsplash.com/photo-1595152772835-219674b2a8a6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                            class="size-14 rounded-full object-cover" />

                        <div>
                            <div class="flex justify-center gap-0.5 text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>

                            <p class="mt-0.5 text-lg font-medium text-gray-900">Paul Starr</p>
                        </div>
                    </div>

                    <p class="mt-4 text-gray-700">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Culpa sit rerum incidunt, a
                        consequuntur recusandae ab saepe illo est quia obcaecati neque quibusdam eius accusamus
                        error officiis atque voluptates magnam!
                    </p>
                </blockquote>
            </div>
        </div>
    </section>
    <!-- Reviews Section End -->

    <!-- Kampus partnert Section Start -->
    {{-- <section id="kampus-partnert" class="pt-24 pb-16">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Kampus</h4>
                    <h4 class="font-semibold text-primary text-3xl mb-4">Partnert</h4>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Kami telah bekerja sama dengan
                    </p>
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                @forelse ($parnerts as $parnert)
                    <div class="mb-12 p-4 md:w-1/6">
                        <div class="rounded-md overflow-hidden flex justify-center items-center">
                            <img src="{{ asset('storage/' . $parnert->logo) }}" alt="" class="w-full">
                        </div>
                    </div>
                @empty
                    <p>Belum ada parnert kampus.</p>
                @endforelse
            </div>
        </div>
    </section> --}}
    <!-- Kampus partnert Section End -->

    <!-- Kepercayaan Section Start -->
    <section id="kepercayaan" class="pt-24 pb-16">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-3xl text-primary mb-2">Dipercaya Oleh</h4>
                    {{-- <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Dipercaya Oleh</h2> --}}
                    {{-- <p class="font-medium text-md text-secondary md:text-lg">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, aut.
                    </p> --}}
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                @forelse ($dipercaya as $percaya)
                    <div class="mb-12 p-4 md:w-1/6">
                        <div class="rounded-md overflow-hidden flex justify-center items-center">
                            <img src="{{ asset('storage/' . $percaya->logo) }}" alt="" width="w-full">
                        </div>
                    </div>
                @empty
                    <p>Belum ada yang percaya.</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Kepercayaan Section End -->

    <!-- Berita Section Start -->
    <section id="artikel" class="pt-24 pb-16 bg-slate-50">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    {{-- <h4 class="font-semibold text-lg text-primary mb-2">Artikel</h4> --}}
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Terbaru</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Baca artikel-artikel Kami!
                    </p>
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                @forelse ($artikel as $item)
                    <div class="mb-12 p-4 md:w-1/3">
                        <a href="{{ route('artikel.view', $item->id) }}">
                            <div class="rounded-md shadow-md overflow-hidden">
                                <img src="{{ asset('storage/' . $item->sampul) }}" alt="" width="w-full">
                            </div>
                            <h3 class="font-semibold text-xl text-dark mt-5 mb-3">{{ $item->judul }}</h3>
                            <p class="font-medium text-base text-secondary">by. <span class="font-bold">{{ $item->penulis->nama }}</span> | {{ $item->created_at->format('d F Y') }}
                            </p>
                        </a>
                    </div>
                @empty
                    <p>Belum ada artikel yang ditambahkan.</p>
                @endforelse
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                @if (optional($artikel)->count() > 0)
                    <a href="{{ route('artikel') }}" class="bg-primary px-4 py-3 text-white rounded-full">Lihat
                        lebih banyak artikel <i class="fa fa-arrow-right"></i></a>
                @endif
            </div>
        </div>
    </section>
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
