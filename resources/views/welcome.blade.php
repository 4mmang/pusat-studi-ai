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
    <section class="pt-32 pb-32 bg-slate-100">
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
    </section>
    <!-- Our statistik Section End --> 
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
                        responsive: true,
                        maintainAspectRatio: false,
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
