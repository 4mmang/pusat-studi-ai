@extends('layouts.admin.master')
@section('content')
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <p class="fs-2 mb-0" style="color: #38527E">Dashboard</p>
        </div>
    
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-6 mb-5">
                <p class="text-center mb-3">Total Penelitian, Pengabdian dan Publikasi</p>
                <canvas id="myBarChart" style="height: 250px; width: 100%"></canvas>
            </div>
            <div class="col-md-6 mb-5">
                <p class="text-center mb-3">Penelitian, Pengabdian dan Publikasi</p>
                <canvas id="myLineChart" style="height: 250px; width: 100%"></canvas>
            </div>
            <div class="col-md-6 mb-5">
                <canvas id="doughnut-canvas8"></canvas>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
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
                            tension: 0.1
                        },
                        {
                            label: 'Pengabdian',
                            data: Object.values(totalPengabdianPerTahun) ?? [0, 0, 0, 0, 0],
                            fill: false,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 2,
                            tension: 0.1
                        },
                        {
                            label: 'Publikasi',
                            data: Object.values(totalPublikasiPerTahun) ?? [0, 0, 0, 0, 0],
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
                            text: 'Grafik Total Data 5 Tahun Terakhir'
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
@endpush