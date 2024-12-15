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
                    <h4 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl">Pusat Studi Artificial Intelligance
                    </h4>
                    <p class="font-medium text-base text-secondary max-w-xl lg:text-lg">Lorem ipsum dolor, sit amet
                        consectetur adipisicing elit. Vitae excepturi possimus, eum veniam voluptatem aperiam accusamus
                        quasi! Vero ipsum, minus incidunt facilis impedit, corrupti odit tempore obcaecati vel veritatis
                        sequi.</p>
                </div>

                <div class="w-full px-4 lg:w-1/2 flex justify-center">
                    <img src="https://picsum.photos/350/400?random=1" alt="Gambar 1" class="h-auto rounded-lg" />
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Hero Section Start -->
    <section id="beranda" class="pt-36 pb-12">
        <div class="container">
            <div class="flex flex-wrap lg:flex-nowrap text-center">
                <div class="w-full self-center px-4">
                    <h4 class="font-semibold text-lg text-primary mb-2">Event</h4>
                    <h2 class="font-medium text-slate-500 text-lg mb-5 lg:text-2xl">
                        <span class="text-dark">Mini Bootcamp Pusat Studi Artificial Intelligence</span>
                    </h2>
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/3">
                    <div class="rounded-md overflow-hidden flex justify-center">
                        <img src="https://picsum.photos/300/400?random=8" class="h-auto rounded-xl" alt="Platform DATAU" width="w-full">
                    </div>
                    {{-- <p class="p-3 text-center">dsadasdb</p> --}}
                    <h3 class="font-semibold text-md flex justify-center text-dark mt-2 mb-3">
                        <a href="" class="p-3 px-5 py-3 bg-primary text-white rounded-full">Daftar Sekarang</a>
                    </h3>
                </div>
                <div class="mb-12 p-4 md:w-1/3">
                    <div class="rounded-md overflow-hidden flex justify-center">
                        <img src="https://picsum.photos/300/400?random=7" class="h-auto rounded-xl" alt="Platform DATAU" width="w-full">
                    </div>
                    <h3 class="font-semibold text-md flex justify-center text-dark mt-2 mb-3">
                        <a href="" class="p-3 px-5 py-3 bg-primary text-white rounded-full">Daftar Sekarang</a>
                    </h3>
                </div>
                <div class="mb-12 p-4 md:w-1/3">
                    <div class="rounded-md overflow-hidden flex justify-center">
                        <img src="https://picsum.photos/300/400?random=9" class="h-auto rounded-xl" alt="Platform DATAU" width="w-full">
                    </div>
                    <h3 class="font-semibold text-md flex justify-center text-dark mt-2 mb-3">
                        <a href="" class="p-3 px-5 py-3 bg-primary text-white rounded-full">Daftar Sekarang</a>
                    </h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Berita Section Start -->
    <section id="portofolio" class="pt-24 pb-16 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Artikel</h4>
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Terbaru</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, aut.
                    </p>
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="https://picsum.photos/800/400?random=8" alt="Platform DATAU" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Dataset Collection Platform</h3>
                    <p class="font-medium text-base text-secondary">This project is a web-based platform designed for
                        collecting and managing datasets. Built using Laravel as the back-end
                        framework, the platform efficiently handles data management and user authentication. The
                        front-end is developed using
                        Bootstrap for responsive design and jQuery to enhance interactivity and handle dynamic content.
                        The platform allows
                        users to upload, manage, and download datasets, providing an intuitive and user-friendly
                        interface.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="https://picsum.photos/800/400?random=7" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Musical Instrument Sales </h3>
                    <p class="font-medium text-base text-secondary">This project is a web-based platform for selling
                        musical instruments, built using Laravel for the back-end, Bootstrap
                        for the front-end, and jQuery to enhance interactivity. The platform allows users to browse and
                        purchase musical
                        instruments with ease. It also features an integrated payment system using Midtrans, ensuring
                        secure and seamless
                        transactions.</p>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="https://picsum.photos/800/400?random=6" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Realtime Chat </h3>
                    <p class="font-medium text-base text-secondary">The Realtime Chat project is a Laravel-based web
                        application that uses Pusher to send real-time messages without needing
                        to refresh the page
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <div class="rounded-md shadow-md overflow-hidden">
                        <img src="https://picsum.photos/800/400?random=5" alt="" width="w-full">
                    </div>
                    <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Supplier Selection Decision Support System
                        using the SAW Method</h3>
                    <p class="font-medium text-base text-secondary">This project is a web-based Supplier Selection
                        Decision Support System built with Laravel, utilizing the Simple Additive
                        Weighting (SAW) method to assist in selecting the best supplier based on predefined criteria.
                    </p>
                </div>
                <a href="{{ route('artikel') }}" class="text-center bg-primary px-4 py-3 text-white rounded-full">Lihat
                    lebih banyak artikel <i class="fa fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
    <!-- Berita Section End -->

    <!-- Our statistik Section Start -->
    {{-- <section class="pt-32 pb-32 bg-slate-100">
        <div class="container">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-bold uppercase text-primary text-lg mb-2">Total Data</h4>
                <div class="max-w-xl">
                    <h2 class="text-3xl font-bold sm:text-4xl">Penelitian, Pengabdian dan Publikasi</h2>

                    <p class="mt-4 text-base text-slate-500">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat dolores iure fugit totam
                        iste obcaecati. Consequatur ipsa quod ipsum sequi culpa delectus, cumque id tenetur
                        quibusdam, quos fuga minima.
                    </p>
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/2">
                    <canvas id="myBarChart" style="height: 300px; width: 100%"></canvas>
                </div>
            </div>
    </section> --}}
    <!-- Our statistik Section End -->
@endsection
@section('scripts')
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myBarChart').getContext('2d');

        // bar
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Penelitian', 'Pengabdian', 'Publikasi'],
                datasets: [{
                    label: 'Total Data',
                    data: [10, 20, 30],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(75, 192, 192)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        responsive: true,
                        maintainAspectRatio: false,
                        beginAtZero: true
                    }
                }
            }
        });
    </script> --}}
@endsection
