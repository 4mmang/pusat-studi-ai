@extends('layouts.app')
@section('content')
    <!-- Hero Section Start -->
    <section id="beranda" class="pt-36 pb-12">
        <div class="container">
            <div class="flex flex-wrap lg:flex-nowrap">
                <div class="w-full self-center px-4 lg:w-1/2">
                    <h1 class="text-base font-semibold text-primary md:text-xl lg:text-xl">
                        {{-- Halo Semua 👋, Kami Adalah --}}
                        <span class="block font-bold text-4xl mt-1 text-primar lg:text-5xl">Selamat <span class="text-dark">Datang</span>
                    </h1>
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

                {{-- <div class="w-full self-end px-4 lg:w-1/2 -mt-10">
                    <div class="relative w-full max-w-2xl mx-auto mt-10 overflow-hidden">
                        <div class="flex transition-transform duration-300" id="slides">
                            <div class="min-w-full">
                                <img src="https://picsum.photos/800/400?random=1" alt="Gambar 1"
                                    class="w-full h-auto rounded-lg" />
                            </div>
                            <div class="min-w-full">
                                <img src="https://picsum.photos/800/400?random=2" alt="Gambar 2" class="w-full h-auto" />
                            </div>
                            <div class="min-w-full">
                                <img src="https://picsum.photos/800/400?random=3" alt="Gambar 3" class="w-full h-auto" />
                            </div>
                        </div>
                        <button onclick="prevSlide()"
                            class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2">Prev</button>
                        <button onclick="nextSlide()"
                            class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2">Next</button>
                    </div>
                </div> --}}

                <div class="w-full self-end px-4 lg:w-1/2 -mt-10">
                    <div class="relative w-full max-w-2xl mx-auto mt-10 overflow-hidden" id="slider-container">
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

    <!-- Our statistik Section Start -->
    <section id="workshops" class="pt-32 pb-32 bg-slate-100">
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
                    <canvas id="myBarChart"></canvas>
                </div>
            </div>
    </section>
    <!-- Our statistik Section End -->

    <!-- About Section Start -->
    <section id="tentang-kami" class="pt-32 pb-32">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold uppercase text-primary text-lg mb-3">Tentang Kami</h4>
                    <h4 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl">Pusat Studi AI</h4>
                    <p class="font-medium text-base text-secondary max-w-xl lg:text-lg">Lorem ipsum dolor, sit amet
                        consectetur adipisicing elit. Vitae excepturi possimus, eum veniam voluptatem aperiam accusamus
                        quasi! Vero ipsum, minus incidunt facilis impedit, corrupti odit tempore obcaecati vel veritatis
                        sequi.</p>
                </div>

                <div class="w-full px-4 lg:w-1/2">
                    <h3 class="font-semibold text-dark text-2xl mb-4 lg:text-3xl lg:pt-10">Bergabung dengan kami!</h3>
                    <p class="font-medium text-base text-secondary mb-6">Connect with us through the social media links
                        below.</p>
                    <div class="flex items-center">
                        <a href="https://www.instagram.com/amm4ng?igsh=MWYxYnI1em9pOWUzcg=="
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                            <svg width="20" role="img" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>Instagram</title>
                                <path
                                    d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                            </svg>
                        </a>
                        <a href="https://wa.me/6282290762799"
                            class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                            <svg width="20" role="img" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <title>WhatsApp</title>
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                            </svg>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        beginAtZero: true
                    }
                }
            }
        });

        // line
        // var myLineChart = new Chart(ctx, {
        //     type: 'line', // Jenis chart adalah line
        //     data: {
        //         labels: ['2021', '2022', '2023'], // Tahun sebagai label
        //         datasets: [{
        //                 label: 'Penelitian',
        //                 data: [10, 15, 40], // Data untuk Penelitian
        //                 fill: false,
        //                 borderColor: 'rgba(255, 99, 132, 1)',
        //                 borderWidth: 2,
        //                 tension: 0.1 // Kelengkungan garis
        //             },
        //             {
        //                 label: 'Pengabdian',
        //                 data: [10, 25, 35], // Data untuk Pengabdian
        //                 fill: false,
        //                 borderColor: 'rgba(54, 162, 235, 1)',
        //                 borderWidth: 2,
        //                 tension: 0.1
        //             },
        //             {
        //                 label: 'Publikasi',
        //                 data: [5, 25, 35], // Data untuk Publikasi
        //                 fill: false,
        //                 borderColor: 'rgba(255, 206, 86, 1)',
        //                 borderWidth: 2,
        //                 tension: 0.1
        //             }
        //         ]
        //     },
        //     options: {
        //         scales: {
        //             y: {
        //                 beginAtZero: true
        //             }
        //         }
        //     }
        // });
    </script>
@endsection
