@extends('layouts.app')
@section('content')
    <style>
        #workshops .statistik-chart { position: relative; width: 100%; height: 250px; }
        #workshops .statistik-empty { height: 100%; box-sizing: border-box; display: flex;
            flex-direction: column; align-items: center; justify-content: center; gap: 10px;
            padding: 24px; text-align: center; background: #f8fafc;
            border: 1px dashed #cbd5e1; border-radius: 12px; color: #64748b; }
        #workshops .statistik-empty strong { color: #475569; font-size: 16px; }
        #workshops .statistik-empty p { margin: 0; font-size: 14px; line-height: 1.6; }
        #workshops .statistik-empty[hidden], #workshops canvas[hidden] { display: none !important; }
    </style>
    <!-- Our statistik Section Start -->
    <section id="workshops" class="pt-36 pb-16">
        <div class="container">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-bold uppercase text-primary text-3xl mb-2">Data Statistik</h4>
                <div class="max-w-xl">
                    {{-- <h2 class="text-3xl font-bold sm:text-4xl">Penelitian, Pengabdian dan Publikasi</h2> --}}

                    <p class="mt-4 text-base text-slate-500">
                    Pusat Studi Artificial Intelligence Universitas Sulawesi Barat melakukan berbagai kegiatan termasuk pada bidang Penelitian, Pengabdian dan juga Publikasi sebagai kontribusi pada berbagai aspek, khususnya pada kajian artificial intelligence (AI) pada berbagai bidang. Adapun statistik data dari pusat studi ini dapat dilihat dibawah.
                    </p>
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-12 p-4 md:w-1/2">
                    <h1 class="text-center mb-3">Lakukan pencarian berdasarkan tahun</h1>
                    <div class="text-center">
                        <input type="number" id="tahun" name="tahun" placeholder="Masukkan tahun"
                            class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <button onclick="filter()" class="bg-primary p-2 text-white rounded-xl px-5">Filter</button>
                    </div>
                    <div class="statistik-chart mt-3">
                        <canvas id="myBarChart" style="height: 250px; width: 100%"></canvas>
                        <div id="myBarChart-empty" class="statistik-empty" role="status" aria-live="polite" hidden>
                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path d="M4 4v16h16M8 16v-4m5 4V8m5 8v-6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <strong>Belum ada data</strong>
                            <p>Data untuk grafik ini belum tersedia.</p>
                        </div>
                    </div>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <h1 class="text-center mb-3">Persentase Total Penelitian, Pengabdian dan Publikasi</h1>
                    <div>
                        <div class="statistik-chart">
                        <canvas id="doughnut-totaldata" style="height: 250px; width: 100%"></canvas>
                        <div id="doughnut-totaldata-empty" class="statistik-empty" role="status" aria-live="polite" hidden>
                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path d="M4 4v16h16M8 16v-4m5 4V8m5 8v-6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <strong>Belum ada data</strong>
                            <p>Data untuk grafik ini belum tersedia.</p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <h1 class="text-center mb-3">Penelitian, Pengabdian dan Publikasi</h1>
                    <div>
                        <div class="statistik-chart">
                        <canvas id="myLineChart" style="height: 250px; width: 100%"></canvas>
                        <div id="myLineChart-empty" class="statistik-empty" role="status" aria-live="polite" hidden>
                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path d="M4 4v16h16M8 16v-4m5 4V8m5 8v-6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <strong>Belum ada data</strong>
                            <p>Data untuk grafik ini belum tersedia.</p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <h1 class="text-center mb-3">Persentase Berdasarkan Level Penelitian</h1>
                    <div>
                        <div class="statistik-chart">
                        <canvas id="doughnut-levelpenelitian" style="height: 250px; width: 100%"></canvas>
                        <div id="doughnut-levelpenelitian-empty" class="statistik-empty" role="status" aria-live="polite" hidden>
                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path d="M4 4v16h16M8 16v-4m5 4V8m5 8v-6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <strong>Belum ada data</strong>
                            <p>Data untuk grafik ini belum tersedia.</p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <h1 class="text-center mb-3">Persentase Berdasarkan Level Pengabdian</h1>
                    <div>
                        <div class="statistik-chart">
                        <canvas id="doughnut-levelpengabdian" style="height: 250px; width: 100%"></canvas>
                        <div id="doughnut-levelpengabdian-empty" class="statistik-empty" role="status" aria-live="polite" hidden>
                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path d="M4 4v16h16M8 16v-4m5 4V8m5 8v-6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <strong>Belum ada data</strong>
                            <p>Data untuk grafik ini belum tersedia.</p>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="mb-12 p-4 md:w-1/2">
                    <h1 class="text-center mb-3">Persentase Berdasarkan Level Publikasi</h1>
                    <div>
                        <div class="statistik-chart">
                        <canvas id="doughnut-levelpublikasi" style="height: 250px; width: 100%"></canvas>
                        <div id="doughnut-levelpublikasi-empty" class="statistik-empty" role="status" aria-live="polite" hidden>
                            <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                                <path d="M4 4v16h16M8 16v-4m5 4V8m5 8v-6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <strong>Belum ada data</strong>
                            <p>Data untuk grafik ini belum tersedia.</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Our statistik Section End -->
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Simpan konfigurasi dan konstruktor masing-masing chart (file ini memakai Chart.js 2 dan versi modern).
        const statistikCharts = {};

        function hasStatistikData(datasets) {
            return datasets.some(dataset => Array.isArray(dataset.data) && dataset.data.some(value => {
                const number = Number(value);
                return Number.isFinite(number) && number > 0;
            }));
        }

        function renderStatistikChart(id, config, emptyMessage) {
            let entry = statistikCharts[id];
            if (!entry) {
                entry = statistikCharts[id] = { config: config, constructor: Chart, chart: null };
            }
            const canvas = document.getElementById(id);
            const empty = document.getElementById(id + '-empty');
            const hasData = hasStatistikData(entry.config.data.datasets);
            empty.querySelector('p').textContent = emptyMessage || 'Data untuk grafik ini belum tersedia.';
            empty.hidden = hasData;
            canvas.hidden = !hasData;

            // Jangan membuat chart kosong; buat kembali ketika data tersedia.
            if (!hasData) {
                if (entry.chart) {
                    entry.chart.destroy();
                    entry.chart = null;
                }
                return;
            }
            if (!entry.chart) {
                entry.chart = new entry.constructor(canvas, entry.config);
            } else {
                entry.chart.data = entry.config.data;
                entry.chart.update();
            }
        }


        // bar
        let data = ["{{ $totalPenelitian ?? 0 }}", "{{ $totalPengabdian ?? 0 }}", "{{ $totalPublikasi ?? 0 }}"]

        renderStatistikChart('myBarChart', {
            type: 'bar',
            data: {
                labels: ['Penelitian', 'Pengabdian', 'Publikasi'],
                datasets: [{
                    label: 'Total Data',
                    data: data,
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                    borderColor: ['#FF6384', '#36A2EB', '#FFCE56'],
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

        async function filter() {
            let tahun = document.getElementById('tahun').value.trim();
            if (!tahun) return;
            try {
                const response = await fetch('statistik/filter/' + tahun);
                if (!response.ok) throw new Error('Gagal mengambil data statistik.');
                const res = await response.json();

                // Perbarui data
                data = [res.totalPenelitian, res.totalPengabdian, res
                    .totalPublikasi
                ]; // Pastikan res.tahun adalah array dengan data baru

                const chartData = statistikCharts.myBarChart.config.data;
                chartData.datasets[0].data = data;
                chartData.datasets[0].label = 'Total Data Tahun ' + tahun;
                renderStatistikChart('myBarChart', null,
                    'Belum ada data pada tahun ' + tahun + '.');
            } catch (e) {
                console.error('Error:', e);
            }
        }
        // line
        const totalPenelitianPerTahun = @json($totalPenelitianPerTahun ?? []);
        const totalPengabdianPerTahun = @json($totalPengabdianPerTahun ?? []);
        const totalPublikasiPerTahun = @json($totalPublikasiPerTahun ?? []);
        const statistikYears = [...new Set([
            ...Object.keys(totalPenelitianPerTahun),
            ...Object.keys(totalPengabdianPerTahun),
            ...Object.keys(totalPublikasiPerTahun)
        ])].sort((a, b) => Number(a) - Number(b));
        renderStatistikChart('myLineChart', {
            type: 'line',
            data: {
                labels: statistikYears, // Gabungan tahun dari ketiga kategori
                datasets: [{
                        label: 'Penelitian',
                        data: statistikYears.map(tahun => Number(totalPenelitianPerTahun[tahun]) || 0),
                        fill: false,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        tension: 0.1 // Default tension
                    },
                    {
                        label: 'Pengabdian',
                        data: statistikYears.map(tahun => Number(totalPengabdianPerTahun[tahun]) || 0),
                        fill: false,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.2 // Tension negatif untuk arah berlawanan
                    },
                    {
                        label: 'Publikasi',
                        data: statistikYears.map(tahun => Number(totalPublikasiPerTahun[tahun]) || 0),
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

            renderStatistikChart(id, {
                type: type,
                data: data,
                options: options
            });
        }
        ['doughnut'].forEach(function(type) {
            createChart(["{{ $totalPenelitian ?? 0 }}", "{{ $totalPengabdian ?? 0 }}", "{{ $totalPublikasi ?? 0 }}"], [
                'Penelitian', 'Pengabdian', 'Publikasi'
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
            createChart(["{{ $q1 ?? 0 }}",
                    "{{ $q2 ?? 0 }}", "{{ $q3 ?? 0 }}",
                    "{{ $q4 ?? 0 }}", "{{ $noQuartile ?? 0 }}", "{{ $nasional ?? 0 }}"
                ],
                ['Quartile-1 (Q1)', 'Quartile-2 (Q2)', 'Quartile-3 (Q3)', 'Quartile-4 (Q4)', 'No-Quartile', 'Nasional'], type +
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
            createChart(["{{ $mandiriPengabdian ?? 0 }}", "{{ $universitasPengabdian ?? 0 }}", "{{ $nasionalPengabdian ?? 0 }}",
                    "{{ $internasionalPengabdian ?? 0 }}", "{{ $pengabdianLainnya ?? 0 }}"
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
            createChart(["{{ $mandiriPenelitian ?? 0 }}", "{{ $universitasPenelitian ?? 0 }}", "{{ $nasionalPenelitian ?? 0 }}",
                    "{{ $internasionalPenelitian ?? 0 }}", "{{ $penelitianLainnya ?? 0 }}"
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
