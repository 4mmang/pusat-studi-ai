@extends('layouts.pusat-studi.app')
@section('content')
    <!-- About Section Start -->
    <section id="tentang-kami" class="pt-36 pb-32">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold uppercase text-primary text-lg mb-3">Kinerja Anggota</h4>
                    <p class="font-medium text-base text-secondary max-w-xl lg:text-lg">Lorem, ipsum dolor sit amet
                        consectetur adipisicing.</p>
                </div>
            </div>
            <div class="bg-white shadow-lg ml-4 mr-4 rounded-lg p-7 border border-gray-200">
                <div class="flex flex-row flex-wrap">
                    <div class="w-full md:w-1/4 px-4 mb-4">
                        <div class="mb-2">
                            <label for="password1" class="block text-gray-700 text-sm font-bold mb-2">Anggota:</label>
                            <form class="max-w-sm mx-auto">
                                {{-- <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label> --}}
                                <select id="countries"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="US">Wawan Firgiawan S.T.,M.Kom</option>
                                    <option value="CA">Amirul Asnan Cirua S.T., M.Kom</option>
                                    <option value="FR">Arman Umar</option>
                                </select>
                            </form>
                            {{-- <input type="text" id="password1" name="password" placeholder="Cari nama anggota"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                        </div>
                    </div>
                    <div class="w-full md:w-1/4 px-4 mb-4">
                        <div class="mb-2">
                            <label for="password2" class="block text-gray-700 text-sm font-bold mb-2">Mulai:</label>
                            <input type="date" id="password2" name="password" placeholder="Enter your password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                    <div class="w-full md:w-1/4 px-4 mb-4">
                        <div class="mb-2">
                            <label for="password3" class="block text-gray-700 text-sm font-bold mb-2">Akhir:</label>
                            <input type="date" id="password3" name="password" placeholder="Enter your password"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                    <div class="w-full md:w-1/6 px-4 mb-4">
                        <div class="mb-2">
                            <button type="button" id="proses" onclick="proses()"
                                class="bg-blue-500 rounded-full text-white px-4 py-2 mt-7 hover:bg-blue-600 w-full">Proses</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="cetak" class="bg-white hidden shadow-sm ml-4 mr-4 rounded-lg p-12 mt-4 border border-gray-200">
                <a href="#" class="p-2 text-white px-5 rounded-lg py-3 bg-primary">Download</a>
                <div class="flex flex-row flex-wrap border border-gray-400 mt-10">
                    <div class="w-full text-center p-10">
                        <p class="text-3xl lg:text-6xl font-bold">Pusat Studi Artificial Intelligance</p>
                        <p class="font-medium text-secondary mt-3">Data Laporan Penelitian, Pengabdian kepada Masyarakat dan
                            Publikasi Ilmiah
                            Pusat Studi Artificial Intelligance Universitas Sulawesi Barat</p>
                        <p class="text-secondary">Tanggal Cetak: 24 November 2024</p>
                    </div>
                    <div class="w-full lg:w-1/2 p-5">
                        <p class="mb-2 font-bold text-secondary">Data Diri</p>
                        <div class="overflow-x-auto">
                            <table class="table min-w-full bg-white text-sm table-striped">
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Nama</th>
                                    <td class="px-4 py-2 text-start text-gray-900">Arman Umar</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Inisial</th>
                                    <td class="px-4 py-2 text-start text-gray-900">AU</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">NIP</th>
                                    <td class="px-4 py-2 text-start text-gray-900">1234567</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Email</th>
                                    <td class="px-4 py-2 text-start text-gray-900">arman@gmail.com</td>
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
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Penelitian</th>
                                    <td class="px-4 py-2 text-start text-gray-900">10</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Penelitian</th>
                                    <td class="px-4 py-2 text-start text-gray-900">9</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Publikasi Jurnal Penelitian
                                    </th>
                                    <td class="px-4 py-2 text-start text-gray-900">18</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Publikasi Jurnal Pengabdian
                                    </th>
                                    <td class="px-4 py-2 text-start text-gray-900">7</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Publikasi Lain</th>
                                    <td class="px-4 py-2 text-start text-gray-900">2</td>
                                </tr>
                                <tr>
                                    <th class="px-4 py-2 font-medium text-start text-gray-700">Total Publikasi</th>
                                    <td class="px-4 py-2 text-start text-gray-900">30</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="w-full lg:w-1/2 p-5">
                        <p class="mb-2 font-bold text-secondary">Data Pengabdian</p>
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
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Status</th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Progres</th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Laporan</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 text-xs">
                                    <tr class="odd:bg-gray-50 text-center">
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">2023</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">Comparative Study of SAW,
                                            MAUT and SMART Methods in Selecting Smartphones for Online Learning</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                            <p class="whitespace-nowrap">Ketua
                                            </p>
                                        </td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">100%</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">Sudah</td>
                                    </tr>
                                    <tr class="odd:bg-gray-50 text-center">
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">2023</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">Lorem ipsum dolor, sit
                                            amet consectetur adipisicing.</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                            <p class="whitespace-nowrap">Anggota
                                            </p>
                                        </td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">100%</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">Belum</td>
                                    </tr>
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
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Status</th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Progres</th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Laporan</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 text-xs">
                                    <tr class="odd:bg-gray-50 text-center">
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">2023</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">Comparative Study of
                                            SAW,
                                            MAUT and SMART Methods in Selecting Smartphones for Online Learning</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                            <p class="whitespace-nowrap">Ketua
                                            </p>
                                        </td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">100%</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">Sudah</td>
                                    </tr>
                                    <tr class="odd:bg-gray-50 text-center">
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">2023</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">Lorem ipsum dolor, sit
                                            amet consectetur adipisicing.</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                            <p class="whitespace-nowrap">Anggota
                                            </p>
                                        </td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">100%</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">Belum</td>
                                    </tr>
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
                                            No
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Tanggal
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Level
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            jenis
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Judul
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Nama Publikasi
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 text-xs">
                                    <tr class="odd:bg-gray-50 text-center">
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">1</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">12/12/2023</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">Nasional</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">HKI (Hak Cipta)</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">Comparative Study of
                                            SAW,
                                            MAUT and SMART Methods in Selecting Smartphones for Online Learning</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                            <p class="whitespace-nowrap">e-Hak cipta
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="w-full p-5">
                        <p class="mb-2 font-bold text-secondary">Kegiatan Penunjang</p>
                        <div class="overflow-x-auto">
                            <table class="table min-w-full bg-white text-sm table-striped">
                                <thead class="bg-slate-300 text-xs">
                                    <tr>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            No
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            jenis
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Peran
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Nama Kegiatan
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Tanggal
                                        </th>
                                        <th
                                            class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">
                                            Nomor SK/ST
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 text-xs">
                                    {{-- <tr class="odd:bg-gray-50 text-center">
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">1</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">12/12/2023</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">Nasional</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">HKI (Hak Cipta)</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">Comparative Study of SAW,
                                            MAUT and SMART Methods in Selecting Smartphones for Online Learning</td>
                                        <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                                <p class="whitespace-nowrap">e-Hak cipta
                                                </p>
                                        </td>
                                    </tr>  --}}
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
        function proses() {
            let btnProses = document.getElementById('proses')
            btnProses.disabled = true
            btnProses.textContent = 'Memproses...'
            setTimeout(() => {
                btnProses.disabled = false
                btnProses.textContent = 'Proses'
                document.getElementById('cetak').classList.remove('hidden')
            }, 2000);
        }
    </script>
@endsection
