@extends('layouts.app')
@section('content')
    <!-- Anggota Section Start -->
    <section id="anggota" class="pt-32 pb-16">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    {{-- <h4 class="font-semibold text-lg text-primary mb-2">Daftar</h4> --}}
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Anggota</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, aut.
                    </p>
                </div>
            </div>

            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                @forelse ($anggota as $ang)
                    <div class="mb-12 p-4 md:w-1/3 border border-slate-300">
                        <div class="rounded-md shadow-md overflow-hidden">
                            @if ($ang->foto)
                                <img src="{{ asset('storage/' . $ang->foto) }}" alt="" width="w-full">
                            @else
                                <img src="{{ asset('img/Avatar-Profile-PNG-Free-Image.png') }}" alt=""
                                    width="w-full">
                            @endif
                        </div>
                        <h3 class="font-semibold text-xl text-dark mt-5 mb-3 text-center">{{ $ang->nama }}</h3>
                    </div>
                @empty
                    <p>Belum ada anggota yang terdaftar.</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Anggota Section End -->
@endsection
