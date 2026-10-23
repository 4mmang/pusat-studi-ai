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
        // Tampilkan pesan apabila seluruh data pada sebuah grafik bernilai nol.
        function chartHasData(values) {
            return values.some(value => Number(value) > 0);
        }

        function showChartOrMessage(canvasId, values) {
            const canvas = document.getElementById(canvasId);
            if (!canvas) return false;
            if (chartHasData(values)) return true;

            canvas.style.display = 'none';
            const message = document.createElement('div');
            message.className = 'd-flex flex-column align-items-center justify-content-center text-muted text-center';
            message.style.minHeight = '250px';
            message.innerHTML = '<div style="font-size: 32px; opacity: .55; margin-bottom: 8px;">&#128202;</div>' +
                '<p class="mb-0">Data belum tersedia</p>';
            canvas.parentNode.insertBefore(message, canvas.nextSibling);
            return false;
        }

        const totalData = @json([$totalPenelitian, $totalPengabdian, $totalPublikasi]);
        const showBar = showChartOrMessage('myBarChart', totalData);
        const bar = showBar ? document.getElementById('myBarChart').getContext('2d') : null;


        // bar
        if (showBar) new Chart(bar, {
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
        const lineData = [
            ...Object.values(totalPenelitianPerTahun),
            ...Object.values(totalPengabdianPerTahun),
            ...Object.values(totalPublikasiPerTahun)
        ];
        const showLine = showChartOrMessage('myLineChart', lineData);
        const line = showLine ? document.getElementById('myLineChart').getContext('2d') : null;
        if (showLine) new Chart(line, {
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
                        tension: 0.2
                    },
                    {
                        label: 'Publikasi',
                        data: Object.values(totalPublikasiPerTahun) ?? [0, 0, 0, 0, 0],
                        fill: false,
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 2,
                        tension: 0
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
        function createChart(dataChart, labels, id, type, options) {
            if (!showChartOrMessage(id, dataChart)) return;
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
            createChart(["{{ $q1 }}",
                    "{{ $q2 }}", "{{ $q3 }}",
                    "{{ $q4 }}", "{{ $noQuartile }}", "{{ $nasional }}"
                ],
                ['Quartile-1 (Q1)', 'Quartile-2 (Q2)', 'Quartile-3 (Q3)', 'Quartile-4 (Q4)', 'No-Quartile',
                    'Nasional'
                ], type +
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
