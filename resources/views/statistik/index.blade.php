@extends('layouts.app')
@section('content')
    <!-- Our statistik Section Start -->
    <section id="workshops" class="pt-32 pb-32 bg-slate-100">
        <div class="container">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-bold uppercase text-primary text-lg mb-2">Statistik Data</h4>
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
                    <h1 class="text-center mb-3">Total Penelitian, Pengabdian dan Publikasi</h1>
                    <canvas id="myBarChart" style="height: 250px; width: 100%"></canvas>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <h1 class="text-center mb-3">Grafik Persentase Partisipasi Dosen</h1>
                    <canvas id="myLineChart" style="height: 250px; width: 100%"></canvas>
                </div>
                <div class="mb-12 p-4 md:w-full">
                    <canvas id="myLineChart1" style="height: 300px; width: 100%"></canvas>
                </div>
            </div>
    </section>
    <!-- Our statistik Section End -->
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var bar = document.getElementById('myBarChart').getContext('2d');
        var line = document.getElementById('myLineChart').getContext('2d');
        var line1 = document.getElementById('myLineChart1').getContext('2d');

        // bar
        var myBarChart = new Chart(bar, {
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

        // line
        var myLineChart = new Chart(line, {
            type: 'line', // Jenis chart adalah line
            data: {
                labels: ['2021', '2022', '2023', '2024'], // Tahun sebagai label
                datasets: [{
                        label: 'Penelitian',
                        data: [10, 15, 40, 0], // Data untuk Penelitian
                        fill: false,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        tension: 0.1 // Kelengkungan garis
                    },
                    {
                        label: 'Pengabdian',
                        data: [10, 25, 35, 5], // Data untuk Pengabdian
                        fill: false,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.1
                    },
                    {
                        label: 'Publikasi',
                        data: [5, 25, 35, 10], // Data untuk Publikasi
                        fill: false,
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 2,
                        tension: 0.1
                    }
                ]
            },
            options: {
                animations: {
                    tension: {
                        duration: 2000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        responsive: true,
                        maintainAspectRatio: false,
                        beginAtZero: true
                    }
                }
            }
        });

        var myLineChart1 = new Chart(line1, {
            type: 'line',
            data: {
                labels: ['2021', '2022', '2023', '2024', '2025', '2026', '2027', '2028', '2029'],
                datasets: [{
                        label: 'Penelitian',
                        data: [10, 15, 40, 0, 10, 11, 20, 5, 0],
                        fill: false,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        tension: 0.1
                    },
                    {
                        label: 'Pengabdian',
                        data: [10, 25, 35, 5, 0, 0, 0, 0, 0],
                        fill: false,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.1
                    },
                    {
                        label: 'Publikasi',
                        data: [5, 25, 100, 10, 10, 20, 18, 20, 20],
                        fill: false,
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 2,
                        tension: 0.1
                    }
                ]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Grafik Persentase Partisipasi Dosen'
                    },
                },
                animations: {
                    tension: {
                        duration: 2000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        responsive: true,
                        maintainAspectRatio: false, // Menjaga tinggi chart
                        beginAtZero: true,
                    }
                }
            }
        });
    </script>
@endsection
