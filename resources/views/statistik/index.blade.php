@extends('layouts.app')
@section('content')
    <!-- Our statistik Section Start -->
    <section id="workshops" class="pt-36 pb-16">
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
                    <h1 class="text-center mb-3">Penelitian, Pengabdian dan Publikasi</h1>
                    <canvas id="myLineChart" style="height: 250px; width: 100%"></canvas>
                </div>
                <div class="mb-12 p-4 md:w-full">
                    <canvas id="doughnut-canvas8"></canvas>
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

        // bar
        var myBarChart = new Chart(bar, {
            type: 'bar',
            data: {
                labels: ['Penelitian', 'Pengabdian', 'Publikasi'],
                datasets: [{
                    label: 'Total Data',
                    data: ["{{ $totalPenelitian }}", "{{ $totalPengabdian }}", "{{ $totalPublikasi }}"],
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56'
                    ],
                    borderColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        responsive: true,
                        maintainAspectRatio: false,
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1, // Kenaikan 1 per langkah
                            callback: function(value) {
                                return Number.isInteger(value) ? value : null; // Hanya tampilkan bilangan bulat
                            }
                        }
                    }
                }
            }
        });
        // line
        const totalPenelitianPerTahun = @json($totalPenelitianPerTahun);
        const totalPengabdianPerTahun = @json($totalPengabdianPerTahun);
        const totalPublikasiPerTahun = @json($totalPublikasiPerTahun);
        var myLineChart = new Chart(line, {
            type: 'line',
            data: {
                labels: Object.keys(totalPenelitianPerTahun), // Gunakan label dinamis
                datasets: [{
                        label: 'Penelitian',
                        data: Object.values(totalPenelitianPerTahun),
                        fill: false,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        tension: 0.1 // Default tension
                    },
                    {
                        label: 'Pengabdian',
                        data: Object.values(totalPengabdianPerTahun) ?? [0, 0, 0, 0, 0],
                        fill: false,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.2 // Tension negatif untuk arah berlawanan
                    },
                    {
                        label: 'Publikasi',
                        data: Object.values(totalPublikasiPerTahun) ?? [0, 0, 0, 0, 0],
                        fill: false,
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 2,
                        tension: 0 // Tension besar untuk efek lengkung lebih tajam
                    }
                ]
            },
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Grafik Total Data 5 Tahun Terakhir'
                    },
                },
                animations: {
                    tension: {
                        duration: 2000,
                        easing: 'easeInOutQuad',
                        from: function(context) {
                            return context.datasetIndex === 0 ? 1 : context.datasetIndex === 1 ? 0.5 :
                            1; // Sesuaikan arah berdasarkan dataset
                        },
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        responsive: true,
                        maintainAspectRatio: false, // Menjaga tinggi chart
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1, // Kenaikan 1 per langkah
                            callback: function(value) {
                                return Number.isInteger(value) ? value : null; // Hanya tampilkan bilangan bulat
                            }
                        }
                    }
                }
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
    <script>
        function createChart(id, type, options) {
            var data = {
                labels: ['Penelitian', 'Pengabdian', 'Publikasi'],
                datasets: [{
                    label: 'My First dataset',
                    data: ["{{ $totalPenelitian }}", "{{ $totalPengabdian }}", "{{ $totalPublikasi }}"],
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56'
                    ]
                }]
            };

            new Chart(document.getElementById(id), {
                type: type,
                data: data,
                options: options
            });
        }
        ['doughnut'].forEach(function(type) {
            createChart(type + '-canvas8', type, {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    labels: [{
                            render: 'label',
                            position: 'outside'
                        },
                        {
                            render: 'percentage'
                        }
                    ]
                }
            });
        });
    </script>
@endsection
