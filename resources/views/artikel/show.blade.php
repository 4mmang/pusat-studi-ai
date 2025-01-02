@extends('layouts.app')
@section('content')
    <section class="pt-36 pb-16">
        <div class="container">
            <div class="w-full px-4">
                <div>
                    <h2 class="font-bold text-3xl">{{ $artikel->judul }}</h2>
                    <p class="font-medium text-base text-secondary mb-4 mt-2">{{ $artikel->deskripsi }}</p>
                    <img src="{{ asset('storage/' . $artikel->sampul) }}" class="md:w-1/2 w-full" alt="">
                </div>
                <div class="mt-5">
                    {!! $artikel->konten !!}
                </div>
            </div>
        </div>
    </section>
@endsection
