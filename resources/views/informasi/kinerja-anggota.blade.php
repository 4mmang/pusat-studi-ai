@extends('layouts.app')
@section('content')
    <!-- About Section Start -->
    <section id="tentang-kami" class="pt-36 pb-32">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-10 ">
                    <h4 class="font-bold uppercase text-primary text-lg mb-3">Kinerja Anggota</h4>
                    <p class="font-medium text-base text-secondary lg:text-lg">Silahkan pilih nama anggota pusat studi pada form dibawah untuk melihat kinerja.</p>
                </div>
            </div>
            <div class="bg-white shadow-lg ml-4 mr-4 rounded-lg p-7 border border-gray-200">
                <div class="flex flex-row flex-wrap">
                    <div class="w-full md:w-1/4 px-4 mb-4">
                        <div class="mb-2">
                            <label for="password1" class="block text-gray-700 text-sm font-bold mb-2">Anggota:</label>
                            <form class="max-w-sm mx-auto">
                                <select id="user_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach ($anggota as $ang)
                                        <option value="{{ $ang->id }}">{{ $ang->nama }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="w-full md:w-1/4 px-4 mb-4">
                        <div class="mb-2">
                            <label for="mulai" class="block text-gray-700 text-sm font-bold mb-2">Mulai:</label>
                            <input type="date" id="mulai" name="mulai" placeholder="Enter your mulai"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                    <div class="w-full md:w-1/4 px-4 mb-4">
                        <div class="mb-2">
                            <label for="akhir" class="block text-gray-700 text-sm font-bold mb-2">Akhir:</label>
                            <input type="date" id="akhir" name="akhir" placeholder="Enter your akhir"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                    <div class="w-full md:w-1/6 px-4 mb-4">
                        <div class="mb-2">
                            <button type="button" id="proses" onclick="proses()"
                                class="bg-blue-500 rounded-full text-white px-4 py-2 mt-7 hover:bg-blue-600 w-full"><i
                                    class="fal fa-share-all"></i> Proses</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="cetak"
                class="bg-white @if (!$kinerja) hidden @endif  shadow-sm ml-4 mr-4 rounded-lg p-12 mt-4 border border-gray-200">
                {{-- <a href="#" class="p-2 text-white px-5 rounded-lg py-3 bg-primary">Download</a> --}}
                <div class="flex flex-row flex-wrap border border-gray-400 mt-10">
                    <div class="w-full text-center p-10">
                        <p class="text-3xl lg:text-6xl font-bold">Pusat Studi Artificial Intelligance</p>
                        <p class="font-medium text-secondary mt-3">Data Laporan Penelitian, Pengabdian kepada Masyarakat dan
                            Publikasi Ilmiah
                            Pusat Studi Artificial Intelligance Universitas Sulawesi Barat</p>
                        <p class="text-secondary">Tanggal: 24 November 2024</p>
                    </div>
                    <div class="w-full lg:w-1/2 p-5">
                        <p class="mb-2 font-bold text-secondary">Data Diri</p>
                        <div class="overflow-x-auto">
                            <table class="table min-w-full bg-white text-sm table-striped">
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Nama</th>
                                    <td class="px-4 py-2 text-start text-gray-900" id="nama">
                                        {{ $kinerja['anggota']->nama ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">NIP/NIDN</th>
                                    <td class="px-4 py-2 text-start text-gray-900" id="nip">
                                        {{ $kinerja['anggota']->nip ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Email</th>
                                    <td class="px-4 py-2 text-start text-gray-900" id="email">
                                        {{ $kinerja['anggota']->email ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Jenis Kelamin</th>
                                    <td class="px-4 py-2 text-start text-gray-900" id="jenis_kelamin">
                                        @if ($kinerja)
                                            {{ $kinerja['anggota']->jenis_kelamin === 'lk' ? 'Laki - laki' : 'Perempuan' }}
                                    </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Program Studi</th>
                                    <td class="px-4 py-2 text-start text-gray-900">Informatika</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 p-5">
                        <p class="mb-2 font-bold text-secondary">Jumlah Data Keseluruhan</p>
                        <div class="overflow-x-auto">
                            <table class="table min-w-full bg-white text-sm table-striped">
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Publikasi</th>
                                    <td class="px-4 py-2 text-start text-gray-900" id="jumlahPublikasi">
                                        {{ $kinerja['jumlahPublikasi'] ?? '0' }}</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Penelitian</th>
                                    <td class="px-4 py-2 text-start text-gray-900" id="jumlahPenelitian">
                                        {{ $kinerja['jumlahPenelitian'] ?? '0' }}</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Pengabdian
                                    </th>
                                    <td class="px-4 py-2 text-start text-gray-900" id="jumlahPengabdian">
                                        {{ $kinerja['jumlahPengabdian'] ?? '0' }}</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Total Keseluruhan</th>
                                    <td class="px-4 py-2 text-start text-gray-900" id="totalKeseluruhan">
                                        {{ $kinerja['totalKeseluruhan'] ?? '0' }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 p-5">
                        <p class="mb-2 font-bold text-secondary">Data Pengabdian</p>
                        <div class="overflow-x-auto">
                            <table able class="table min-w-full bg-white text-sm table-striped">
                                <thead class="bg-slate-300 text-xs">
                                    <tr>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Tahun
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Judul
                                        </th>
                                        {{-- <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Status</th> --}}
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Level</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 text-xs" id="data-pengabdian">
                                    @if ($kinerja)
                                        @forelse ($kinerja['pengabdian'] as $pengabdian)
                                            <tr class="odd:bg-gray-50 text-center">
                                                <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                                    {{ date('Y', strtotime($pengabdian->tanggal_pengabdian)) }}</td>
                                                <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                                    {{ $pengabdian->judul }}</td>
                                                {{-- <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                                    {{ $pengabdian->status }}</td> --}}
                                                <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                                    {{ $pengabdian->level }}</td>
                                            </tr>
                                        @empty
                                            <tr class="odd:bg-gray-50 text-center">
                                                <td class="px-4 py-2 text-gray-700 border border-gray-300" colspan="5">
                                                    Kosong
                                                </td>
                                            </tr>
                                        @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 p-5">
                        <p class="mb-2 font-bold text-secondary">Data Penelitian</p>
                        <div class="overflow-x-auto">
                            <table class="table min-w-full bg-white text-sm table-striped">
                                <thead class="bg-slate-300 text-xs">
                                    <tr>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Tahun
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Judul
                                        </th>
                                        {{-- <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Status</th> --}}
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Level</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 text-xs" id="data-penelitian">
                                    @if ($kinerja)
                                        @forelse ($kinerja['penelitian'] as $penelitian)
                                            <tr class="odd:bg-gray-50 text-center">
                                                <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                                    {{ date('Y', strtotime($penelitian->tanggal_penelitian)) }}</td>
                                                <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                                    {{ $penelitian->judul }}</td>
                                                {{-- <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                                    Ketua</td> --}}
                                                <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                                    {{ $penelitian->level }}</td>
                                            </tr>
                                        @empty
                                            <tr class="odd:bg-gray-50 text-center">
                                                <td class="px-4 py-2 text-gray-700 border border-gray-300" colspan="5">
                                                    Kosong
                                                </td>
                                            </tr>
                                        @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="w-full p-5">
                        <p class="mb-2 font-bold text-secondary">Data Publikasi</p>
                        <div class="overflow-x-auto">
                            <table class="table min-w-full bg-white text-sm table-striped">
                                <thead class="bg-slate-300 text-xs">
                                    <tr>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Tahun
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Judul
                                        </th>
                                        {{-- <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Status
                                        </th> --}}
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Level
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 text-xs" id="data-publikasi">
                                    @if ($kinerja)
                                        @forelse ($kinerja['publikasi'] as $publikasi)
                                            <tr class="odd:bg-gray-50 text-center">
                                                <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                                    {{ \Carbon\Carbon::parse($publikasi->tanggal_publikasi)->format('Y') }}
                                                </td>
                                                <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                                    {{ $publikasi->judul }}</td>
                                                {{-- <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                                    Ketua</td> --}}
                                                <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                                    {{ $publikasi->level }}</td>
                                            </tr>
                                        @empty
                                            <tr class="odd:bg-gray-50 text-center">
                                                <td class="px-4 py-2 text-gray-700 border border-gray-300" colspan="5">
                                                    Kosong
                                                </td>
                                            </tr>
                                        @endforelse
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- About Section End -->
@endsection
@section('scripts')
    <script>
        function setDefaultDates() {
            const today = new Date();
            const oneYearAgo = new Date();
            oneYearAgo.setFullYear(today.getFullYear() - 1);

            // Format tanggal menjadi yyyy-mm-dd
            const formatDate = (date) => date.toISOString().split('T')[0];

            // Tetapkan nilai default untuk input tanggal
            document.getElementById('mulai').value = formatDate(oneYearAgo);
            document.getElementById('akhir').value = formatDate(today);
        }

        // Panggil fungsi saat halaman selesai dimuat
        window.onload = setDefaultDates;

        function proses() {
            let userId = document.getElementById('user_id')
            let mulai = document.getElementById('mulai')
            let akhir = document.getElementById('akhir')
            let btnProses = document.getElementById('proses')
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            if (mulai.value != '' && mulai.value != null && akhir.value != '' && akhir.value != null) {
                const kinerja = {
                    userId: userId.value,
                    mulai: mulai.value,
                    akhir: akhir.value,
                }
                btnProses.disabled = true
                btnProses.textContent = 'Memproses...'
                fetch("{{ route('kinerja-anggota.store') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'apllication/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(kinerja)
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Terjadi kesalahan')
                        }
                        return response.json()
                    })
                    .then(res => {

                        // console.log(res);
                        btnProses.disabled = false
                        btnProses.innerHTML = '<i class="fal fa-share-all"></i> Proses';
                        document.getElementById('cetak').classList.remove('hidden')
                        document.getElementById('nama').innerHTML = res.data.anggota.nama
                        document.getElementById('nip').innerHTML = res.data.anggota.nip ?? '-'
                        document.getElementById('email').innerHTML = res.data.anggota.email
                        document.getElementById('jenis_kelamin').innerHTML = (res.data.anggota.jenis_kelamin == 'lk') ?
                            'Laki - laki' : 'Perempuan'

                        document.getElementById('jumlahPublikasi').innerHTML = res.data.jumlahPublikasi
                        document.getElementById('jumlahPenelitian').innerHTML = res.data.jumlahPenelitian
                        document.getElementById('jumlahPengabdian').innerHTML = res.data.jumlahPengabdian
                        document.getElementById('totalKeseluruhan').innerHTML = (res.data.jumlahPublikasi + res.data
                            .jumlahPenelitian + res.data.jumlahPengabdian)


                        let tablePengabdian = '';
                        if (res.data.pengabdian.length > 0) {
                            res.data.pengabdian.forEach(element => {
                                tablePengabdian += ` <tr class="odd:bg-gray-50 text-center">
                            <td class="px-4 py-2 text-gray-700 border border-gray-300">${element.tanggal_pengabdian.split('-')[0]}</td>
                            <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                ${element.judul}
                            </td> 
                            <td class="px-4 py-2 text-gray-700 border border-gray-300 capitalize">${element.level}</td> 
                            `;
                            })
                        } else {
                            tablePengabdian += `
                            <tr class="odd:bg-gray-50 text-center">
                                <td class="px-4 py-2 text-gray-700 border border-gray-300" colspan="5">
                                    Kosong
                                </td>
                            </tr>
                            `;
                        }

                        // Menetapkan hasil loop ke elemen dengan ID 'data-pengabdian'
                        document.getElementById('data-pengabdian').innerHTML = tablePengabdian;

                        let tablePenelitian = '';
                        if (res.data.penelitian.length > 0) {
                            res.data.penelitian.forEach(element => {
                                tablePenelitian += ` <tr class="odd:bg-gray-50 text-center">
                            <td class="px-4 py-2 text-gray-700 border border-gray-300">${element.tanggal_penelitian.split('-')[0]}</td>
                            <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                ${element.judul}
                            </td> 
                            <td class="px-4 py-2 text-gray-700 border border-gray-300 capitalize">${element.level}</td> 
                            </tr>
                            `;
                            })
                        } else {
                            tablePenelitian += `
                            <tr class="odd:bg-gray-50 text-center">
                                <td class="px-4 py-2 text-gray-700 border border-gray-300" colspan="5">
                                    Kosong
                                </td>
                            </tr>
                            `;
                        }

                        // Menetapkan hasil loop ke elemen dengan ID 'data-penelitian'
                        document.getElementById('data-penelitian').innerHTML = tablePenelitian;

                        let tablePublikasi = '';
                        if (res.data.publikasi.length > 0) {
                            res.data.publikasi.forEach(element => {
                                tablePublikasi += ` <tr class="odd:bg-gray-50 text-center">
                                    <td class="px-4 py-2 text-gray-700 border border-gray-300">${element.tanggal_publikasi.split('-')[0]}</td>
                                    <td class="px-4 py-2 text-gray-700 border border-gray-300">${element.judul}</td>
                                    <td class="px-4 py-2 text-gray-700 border border-gray-300 capitalize">${element.level}</td>
                                </tr>
                            `;
                            })
                        } else {
                            tablePublikasi += `
                            <tr class="odd:bg-gray-50 text-center">
                                <td class="px-4 py-2 text-gray-700 border border-gray-300" colspan="5">
                                    Kosong
                                </td>
                            </tr>
                            `;
                        }

                        // Menetapkan hasil loop ke elemen dengan ID 'data-publikasi'
                        document.getElementById('data-publikasi').innerHTML = tablePublikasi;

                    })
                    .catch(e => {
                        btnProses.disabled = false
                        btnProses.innerHTML = '<i class="fal fa-share-all"></i> Proses';
                    })
            } else {
                alert("Pastikan tangal mulai dan akhir di isi!")
            }
        }
    </script>
@endsection
