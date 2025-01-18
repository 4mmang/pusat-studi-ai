@extends('layouts.app')
@section('content')
    <!-- Kontak Section Start -->
    <section id="kontak" class="pt-36 pb-16">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-5">
                    <h2 class="font-bold text-3xl sm:text-4xl lg:text-2xl mb-4">Laporan Kinerja Pusat Studi Artificial Intelligence</h2>
                </div>
            </div>

            <div class="w-full flex flex-wrap justify-center xl:mx-auto">
                <div class="w-full mt-3">
                    @foreach ($unduh as $pdf)
                    <div class=" flex items-center space-x-4 mb-3">
                        <i class="fas fa-file-pdf text-xl border p-4 rounded-xl bg-red-500 text-white"></i>
                        <div>
                            <p><a href="{{ asset('storage/'. $pdf->file) }}" class="text-primary">{{ $pdf->judul }}</a></p>
                            <p>{{ $pdf->deskripsi }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Kontak Section End -->
@endsection
