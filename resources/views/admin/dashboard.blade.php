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
                <p class="text-center mb-3">Persentase Total Penelitian, Pengabdian dan Publikasi</p>
                <div>
                    <canvas id="doughnut-totaldata"></canvas>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <p class="text-center mb-3">Penelitian, Pengabdian dan Publikasi</p>
                <canvas id="myLineChart" style="height: 250px; width: 100%"></canvas>
            </div>
            <div class="col-md-6 mb-5">
                <p class="text-center mb-3">Persentase Berdasarkan Level Penelitian</p>
                <div>
                    <canvas id="doughnut-levelpenelitian"></canvas>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <p class="text-center mb-3">Persentase Berdasarkan Level Pengabdian</p>
                <div>
                    <canvas id="doughnut-levelpengabdian"></canvas>
                </div>
            </div>
            <div class="col-md-6 mb-5">
                <p class="text-center mb-3">Persentase Berdasarkan Level Publikasi</p>
                <div>
                    <canvas id="doughnut-levelpublikasi"></canvas>
                </div>
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
        function createChart(dataChart, labels, id, type, options) {
            var data = {
                labels: labels,
                datasets: [{
                    label: 'My First dataset',
                    data: dataChart,
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#00FF00',
                        '#9966FF',
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
            createChart(["{{ $totalPenelitian }}", "{{ $totalPengabdian }}", "{{ $totalPublikasi }}"], [
                'Penelitian', 'Pengabdian',
                'Publikasi'
            ], type + '-totaldata', type, {
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
        ['doughnut'].forEach(function(type) {
            createChart(["{{ $nasionalPublikasi }}",
                    "{{ $internasionalPublikasi }}", "{{ $nasionalBereputasi }}",
                    "{{ $internasionalBereputasi }}"
                ],
                ['Nasional', 'Internasional', 'Nasional Bereputasi', 'Internasional Bereputasi'], type +
                '-levelpublikasi',
                type, {
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
        ['doughnut'].forEach(function(type) {
            createChart(["{{ $mandiriPengabdian }}", "{{ $universitasPengabdian }}", "{{ $nasionalPengabdian }}",
                    "{{ $internasionalPengabdian }}", "{{ $pengabdianLainnya }}"
                ],
                ['Mandiri', 'Universitas', 'Nasional', 'Internasional', 'Lainnya'], type + '-levelpengabdian',
                type, {
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
        ['doughnut'].forEach(function(type) {
            createChart(["{{ $mandiriPenelitian }}", "{{ $universitasPenelitian }}", "{{ $nasionalPenelitian }}",
                    "{{ $internasionalPenelitian }}", "{{ $penelitianLainnya }}"
                ],
                ['Mandiri', 'Universitas', 'Nasional', 'Internasional', 'Lainnya'], type + '-levelpenelitian',
                type, {
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
