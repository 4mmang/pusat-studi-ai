@extends('layouts.pusat-studi.app')
@section('content')
    <!-- Hero Section Start -->
        <section id="beranda" class="pt-36 pb-12">
            <div class="container">
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
            </div>
        </section>
        <!-- Hero Section End -->
        <!-- Hero Section Start -->
        <section id="beranda" class="pt-0 pb-12">
            <div class="container">
                <div class="flex flex-wrap lg:flex-nowrap text-center">
                    <div class="w-full self-center px-4">
                        {{-- <h1 class="text-base font-semibold text-primary md:text-xl lg:text-xl">
                            Halo Semua 👋, Kami Adalah
                            <span class="block font-bold text-4xl mt-1 text-primar lg:text-5xl">Selamat <span
                                    class="text-dark">Datang</span>
                        </h1> --}}
                        <h2 class="font-medium text-slate-500 text-lg mb-5 lg:text-2xl">
                            {{-- <span class="text-dark">Artificial Intelligence</span> --}}
                        </h2>
                        <p class="font-medium text-secondary mb-10 leading-relaxed">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam nostrum deserunt magni dicta
                            aliquid minus nam aspernatur quia dolore a quasi perferendis maiores dolor assumenda dolores, libero
                            voluptatem, nihil, aut placeat quisquam! Nulla et dolorem molestias velit deleniti quis aliquam enim
                            cumque modi! Reiciendis similique laudantium aliquam architecto nostrum quod.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Hero Section End -->
@endsection