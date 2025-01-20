@extends('layouts.app')
@section('content')
    <!-- Berita Section Start -->
    <section class="pt-32 pb-16">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-12">
                    {{-- <h4 class="font-semibold text-lg text-primary mb-2">Daftar</h4> --}}
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Artikel</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Baca artikel-artikel Kami!
                    </p>
                </div>
            </div>

            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                @forelse ($artikel as $item)
                    <div class="mb-12 p-4 md:w-1/3">
                        <a href="{{ route('artikel.view', $item->id) }}">
                            <div class="rounded-md shadow-md overflow-hidden">
                                <img src="{{ asset('storage/' . $item->sampul) }}" alt="Platform DATAU" width="w-full">
                            </div>
                            <h3 class="font-semibold text-xl text-dark mt-5 mb-3">{{ $item->judul }}</h3>
                            <p class="font-medium text-base text-secondary">by. <span class="font-bold">{{ $item->penulis->nama }}</span> | {{ $item->created_at->format('d F Y') }}
                            </p>
                        </a>
                    </div>
                @empty
                    <p>Belum ada artikel yang ditambahkan.</p>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Berita Section End -->
@endsection
