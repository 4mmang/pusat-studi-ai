@extends('layouts.app')
@section('content')
<!-- pengabdian Section Start -->
<section id="tentang-kami" class="pt-36 pb-32">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="w-full px-4 mb-10">
                <h4 class="font-bold uppercase text-primary text-lg mb-3">Data Pengabdian</h4>
                <p class="font-medium text-base text-secondary lg:text-lg">Data ini dapat diakses publik.
                    Apabila dimanfaatkan untuk kebutuhan pengabdian dan analisis, silahkan hubungi Pusat Studi Artificial Intelligence
                    untuk mendapatkan informasi lebih lanjut</p>
            </div>
        </div>
        <div class="px-4">
            <table id="example" class="stripe hover text-xs" style="width:100%; padding-top:1em; padding-bottom: 1em;">
                <thead class="text-sm">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">No</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Judul
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Author
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Nama
                            Penyelenggara</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Level
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Tahun
                        </th>
                        {{-- <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900 border border-gray-300">Link
                        </th> --}}
                    </tr>
                </thead>
                <tbody class="text-xs text-center">
                    @foreach ($pengabdian as $item)
                    <tr class="odd:bg-gray-50">
                        <td class="px-4 py-2 font-medium text-gray-900 border border-gray-300">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 text-gray-700 border border-gray-300">{{$item->judul}}</td>
                        <td class="px-4 py-2 text-gray-700 text-start border border-gray-300">
                            @foreach ($item->authors as $author)
                            <p class="whitespace-nowrap"><span
                                    class="border text-white rounded-full bg-green-500 px-3">Author {{ $loop->iteration
                                    }}</span>
                                <span
                                    class="border text-white rounded-lg bg-blue-500 px-3 whitespace-nowrap">{{$author->nama}}</span>
                            </p>
                            @endforeach
                        </td>
                        <td class="px-4 py-2 text-gray-700 border border-gray-300">{{ $item->penyelenggara }}</td>
                        <td class="px-4 py-2 text-gray-700 border border-gray-300 capitalize">{{ $item->level }}</td>
                        <td class="whitespace-nowrap px-4 py-2 text-gray-700 border border-gray-300">{{
                            \Carbon\Carbon::parse($item->tanggal_pengabdian)->format('Y') }}</td>
                        {{-- <td class="px-4 py-2 text-gray-700 border border-gray-300"><a
                                href="{{ $item->link_akses }}">Link</a></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div> 
    </div>
    </div>
</section>
<!-- pengabdian Section End -->
@endsection