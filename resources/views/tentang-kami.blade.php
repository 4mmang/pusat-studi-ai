@extends('layouts.app')
@section('content')
    <!-- About Section Start -->
    <section id="tentang-kami" class="pt-36 pb-16 bg-slate-100">
        <div class="container pt-8">
            <div class="flex flex-col-reverse lg:flex-row lg:items-center">
                <!-- Teks -->
                <div class="w-full px-4 mb-10 lg:mb-0 lg:w-1/2">
                    <h4 class="font-bold uppercase text-lg mb-3">
                        Apa itu Pusat Studi <span id="typewriter" class="text-blue-600"></span>?
                    </h4>
                    {{-- <h4 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl">
                        Pusat Studi <span id="typewriter" class="text-blue-600"></span>
                    </h4> --}}
                    <p class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae excepturi possimus, eum veniam
                        voluptatem
                        aperiam accusamus quasi! Vero ipsum, minus incidunt facilis impedit, corrupti odit tempore obcaecati
                        vel
                        veritatis sequi.
                    </p>
                </div>

                <!-- Gambar -->
                <div class="w-full px-4 lg:w-1/2 flex justify-center mb-8 lg:mb-0">
                    {{-- <img src="https://picsum.photos/350/400?random=2" alt="Gambar 1" class="h-auto rounded-lg" /> --}}
                    <img src="{{ asset('img/Logo.jpg') }}" alt="Gambar 1" class="h-auto rounded-lg" />
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <section id="tentang-kami" class="pt-18 pb-32">
        <div class="container pt-10">
            <div class="flex flex-col lg:flex-row lg:items-center">
                <!-- Gambar -->
                <div class="w-full px-4 lg:w-1/2 flex justify-center mb-8 lg:mb-0">
                    {{-- <img src="https://picsum.photos/350/400?random=1" alt="Gambar 1" class="h-auto rounded-lg" /> --}}
                    <img src="{{ asset('img/Logo.jpg') }}" alt="Gambar 1" class="h-auto rounded-lg" />
                </div>

                <!-- Teks -->
                <div class="w-full px-4 lg:w-1/2">
                    <h4 class="font-bold uppercase text-primary text-lg mb-3">
                        Visi & Misi
                    </h4>
                    <h4 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl">
                        Pusat Studi Artificial Intelligance
                    </h4>
                    <h4 class="font-bold uppercase text-primary text-lg">
                        Visi
                    </h4>
                    <li class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae excepturi possimus, eum veniam
                        voluptatem
                        aperiam accusamus quasi! Vero ipsum, minus incidunt facilis impedit, corrupti odit tempore obcaecati
                        vel
                        veritatis sequi.
                    </li>
                    <li class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae excepturi possimus, eum veniam
                        voluptatem.
                    </li>
                    <h4 class="font-bold uppercase text-primary text-lg mt-3">
                        Misi
                    </h4>
                    <li class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae excepturi possimus, eum veniam
                        voluptatem
                        aperiam accusamus quasi! Vero ipsum, minus incidunt facilis impedit, corrupti odit tempore obcaecati
                        vel
                        veritatis sequi.
                    </li>
                    <li class="font-medium text-base text-secondary max-w-xl lg:text-lg">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vitae excepturi possimus, eum veniam
                        voluptatem.
                    </li>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        const typewriter = new Typewriter('#typewriter', {
            loop: true,
            delay: 75,
        });

        typewriter
            .typeString('Artificial Intelligence')
            .pauseFor(1000)
            .deleteAll()
            .start();
    </script>
@endsection
