@extends('layouts.app')
@section('content')
    <section class="pt-36 pb-24">
        <div class="container md:flex">
            <div class="w-full md:w-3/4 px-4 pb-32">
                <div>
                    <h2 class="font-bold text-3xl">{{ $artikel->judul }}</h2>
                    <p class="font-medium text-base text-secondary mb-4 mt-2">{{ $artikel->deskripsi }}</p>
                    <img src="{{ asset('storage/' . $artikel->sampul) }}" class="md:w-1/2 w-full" alt="">
                </div>
                <div class="mt-7 flex gap-4 items-center align-middle">
                    <div class="text-center">
                        <p class="font-base font-bold text-3xl">21.K</p>
                        <p>VIEWS</p>
                    </div>
                    <div class="text-center">
                        <a href="#" onclick="copyLink('{{ url('artikel/' . $artikel->id) }}')"
                            class="font-base font-bold text-1xl bg-primary px-4 p-1 py-2 text-white">
                            <i class="fas fa-link"></i> Salin Link
                        </a>
                    </div>
                </div>
                <div class="mt-5">
                    {!! $artikel->konten !!}
                </div>
            </div>
            <div class="w-full md:w-1/5">
                <p class="text-center text-2xl font-bold font-base mb-4">Artikel Terbaru</p>
                @foreach ($artikelTerbaru as $item)
                    <div class="w-full px-4 flex flex-col gap-6">
                        <a href="{{ route('artikel.view', $item->id) }}">
                            <div class="rounded-md shadow-md overflow-hidden">
                                <img src="{{ asset('storage/' . $item->sampul) }}" alt="Platform DATAU" width="w-full">
                            </div>
                            <h3 class="font-semibold text-1xl text-dark mt-5 mb-3">{{ $item->judul }}</h3>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function copyLink(link) {
            const fullLink = `${link}`; // Membuat URL lengkap
            navigator.clipboard.writeText(fullLink)
                .then(() => {
                    alert('Link berhasil disalin ke clipboard!');
                })
                .catch(err => {
                    console.error('Gagal menyalin link: ', err);
                });
        }
    </script>
@endsection
