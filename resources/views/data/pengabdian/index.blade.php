@extends('layouts.app')
@section('content')
    <!-- About Section Start -->
    <section id="tentang-kami" class="pt-36 pb-32">
        <div class="container">
            <div class="flex flex-wrap">
                <div class="w-full px-4 mb-10 lg:w-1/2">
                    <h4 class="font-bold uppercase text-primary text-lg mb-3">Data Pengabdian</h4>
                    <p class="font-medium text-base text-secondary max-w-xl lg:text-lg">Data ini dapat diakses publik. Apabila dimanfaatkan untuk kebutuhan penelitian dan analisis, silahkan hubungi PSAI
                    untuk mendapatkan informasi lebih lanjut</p>
                </div>
            </div>
            <div class="px-4">
                <div class="overflow-x-auto">
                    <table id="search-table" class="min-w-full divide-y-2 divide-x-2 divide-gray-200 bg-white text-sm border border-gray-300">
                        <thead class="ltr:text-left rtl:text-right">
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">No</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Judul</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Tahun
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Author</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Nama Conf/Jurnal</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Jenis</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Level</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Tanggal</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Link</th>
                            </tr>
                        </thead>
                
                        <tbody class="divide-y divide-gray-200 text-xs">
                            <tr class="odd:bg-gray-50">
                                <td class="px-4 py-2 font-medium text-gray-900 border border-gray-300">1</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">Comparative Study of SAW, MAUT and SMART Methods in Selecting Smartphones for Online Learning</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">2024</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                    <p class="whitespace-nowrap"><span class="border text-white rounded-full bg-green-500 px-3">Author 1</span> <span class="border text-white rounded-lg bg-blue-500 px-3 whitespace-nowrap">Memen Akbar, S.SI., M.T.</span></p>
                                </td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">MALCOM: Indonesian Journal of Machine Learning and Computer Science</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">Jurnal Penelitian</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">Nasional</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 border border-gray-300">2024-01-01</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">Link</td>
                            </tr> 
                            <tr class="odd:bg-gray-50">
                                <td class="px-4 py-2 font-medium text-gray-900 border border-gray-300">2</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">Comparative Study of SAW, MAUT and SMART Methods in Selecting Smartphones for Online Learning</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">2024</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                    <p class="whitespace-nowrap"><span class="border text-white rounded-full bg-green-500 px-3">Author 1</span> <span class="border text-white rounded-lg bg-blue-500 px-3 whitespace-nowrap">Memen Akbar, S.SI., M.T.</span></p>
                                    <p class="whitespace-nowrap"><span class="border text-white rounded-full bg-green-500 px-3">Author 2</span> <span class="border text-white rounded-lg bg-blue-500 px-3 whitespace-nowrap">Memen Akbar, S.SI., M.T.</span></p>
                                    <p class="whitespace-nowrap"><span class="border text-white rounded-full bg-green-500 px-3">Author 3</span> <span class="border text-white rounded-lg bg-blue-500 px-3 whitespace-nowrap">Memen Akbar, S.SI., M.T.</span></p>
                                </td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">MALCOM: Indonesian Journal of Machine Learning and Computer Science</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">Jurnal Penelitian</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">Nasional</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 border border-gray-300">2024-01-01</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">Link</td>
                            </tr> 
                            <tr class="odd:bg-gray-50">
                                <td class="px-4 py-2 font-medium text-gray-900 border border-gray-300">3</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">Comparative Study of SAW, MAUT and SMART Methods in Selecting Smartphones for Online Learning</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">2024</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">
                                    <p class="whitespace-nowrap"><span class="border text-white rounded-full bg-green-500 px-3">Author 1</span> <span class="border text-white rounded-lg bg-blue-500 px-3 whitespace-nowrap">Memen Akbar, S.SI., M.T.</span></p>
                                    <p class="whitespace-nowrap"><span class="border text-white rounded-full bg-green-500 px-3">Author 2</span> <span class="border text-white rounded-lg bg-blue-500 px-3 whitespace-nowrap">Memen Akbar, S.SI., M.T.</span></p>
                                </td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">MALCOM: Indonesian Journal of Machine Learning and Computer Science</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">Jurnal Penelitian</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">Nasional</td>
                                <td class="whitespace-nowrap px-4 py-2 text-gray-700 border border-gray-300">2024-01-01</td>
                                <td class="px-4 py-2 text-gray-700 border border-gray-300">Link</td>
                            </tr> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End --> 
@endsection 