@extends('layouts.app')
@section('content')
    <section id="rekam-jejak" class="pt-36 pb-16 bg-slate-50">
        <div class="container">
            <div class="flex flex-wrap justify-center items-center">
                <div class="w-2/5 flex flex-wrap items-center justify-center">
                    <img src="{{ asset('img/13.png') }}" alt="" class="w-3/4 lg:-mt-16">
                    <p class="font-semibold text-xl text-center lg:z-10 lg:-mt-20">Rekam Jejak Kelompok Riset <span
                            class="text-red-500">Algoritma & Komputasi</span></p>
                </div>
                <div class="md:w-3/5 mt-7">
                    <div class="max-w-6xl mx-auto p-6">
                        <div class="relative">
                            <!-- Vertical Line -->
                            {{-- <div class="absolute left-1/2 transform -translate-x-1/2 w-4 bg-gray-500 h-full">
                            <div class="absolute left-1/2 transform -translate-x-1/2 h-full"
                                style="border-left: 2px dashed white;">
                            </div>
                        </div> --}}
                            <div class="absolute left-1/2 transform -translate-x-1/2 w-4 bg-gray-500 h-full">
                                <!-- Garis vertikal tengah -->
                                <div class="absolute left-1/2 transform -translate-x-1/2 h-full"
                                    style="border-left: 2px dashed white;">
                                </div>

                                <!-- Gambar di atas -->
                            </div>
                            @if (optional($algoritmaKomputasi)->count() > 0)
                            <!-- Gambar di atas -->
                            <img src="{{ asset('img/101.jpeg') }}" alt="Top Image"
                                class="absolute -top-6 left-1/2 transform -translate-x-1/2 w-16 h-auto">
                            
                            <!-- Gambar di bawah -->
                            <img src="{{ asset('img/100.jpeg') }}" alt="Bottom Image"
                                class="absolute -bottom-14 left-1/2 transform -translate-x-1/2 w-16 h-auto">
                            @endif
                            @forelse ($algoritmaKomputasi as $index => $item)
                                <div class="relative flex items-center mb-8 {{ $index % 2 == 0 ? 'mr-16' : 'ml-16' }}">
                                    @if ($index % 2 == 0)
                                        <!-- Item di kanan -->
                                        <div class="w-1/2 text-right pr-4 {{ $index == 0 ? 'mt-10' : '' }}">
                                            <p class="font-bold text-3xl">{{ $item->tahun }}</p>
                                            <p class="text-lg">{{ $item->keterangan }}</p>
                                        </div>
                                        <div
                                            class="w-8 h-8 {{ $index == 0 ? 'mt-4' : '-mt-7' }} bg-{{ $index == 0 ? 'green' : 'blue' }}-500 rounded-full border-2 border-white mx-auto">
                                        </div>
                                        <div class="w-1/2"></div>
                                    @else
                                        <!-- Item di kiri -->
                                        <div class="w-1/2"></div>
                                        <div
                                            class="w-8 h-8 -mt-7 bg-{{ $index == 0 ? 'green' : 'blue' }}-500 rounded-full border-2 border-white mx-auto">
                                        </div>
                                        <div class="w-1/2 pl-4">
                                            <p class="font-bold text-3xl">{{ $item->tahun }}</p>
                                            <p class="text-lg">{{ $item->keterangan }}</p>
                                        </div>
                                    @endif
                                </div>
                            @empty
                                {{-- <p class="text-right w-1/2 pr-4">Belum ada rekam jejak</p> --}}
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
