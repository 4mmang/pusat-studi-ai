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
                        Indobot Academy adalah penyedia layanan edukasi berupa kelas online, training, workshop, pelatihan
                        dan diklat untuk
                        meningkatkan skill SDM di era Revolusi Industri 4.0 guna memajukan teknologi digital masa kini.
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

    <!-- Anggota Section Start -->
    <section id="anggota" class="pt-32 pb-16 bg-slate-100">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Daftar</h4>
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

    <!-- Portofolio Kerja Sama Section Start -->
    <section id="portofolio-kerja-sama" class="pt-24 pb-16">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 class="font-semibold text-lg text-primary mb-2">Portofolio Kerja Sama & Training</h4>
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4"></h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, aut.
                    </p>
                </div>
            </div>
            <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
                <div class="mb-2 p-4 md:w-1/12">
                    <div class="rounded-md overflow-hidden flex justify-center items-center">
                        <img src="{{ asset('img/Logo.jpg') }}" alt="Platform DATAU" width="w-full">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portofolio Kerja Sama Section End -->

    <!-- Portofolio Kerja Sama Section Start -->
    <section id="portofolio-kerja-sama" class="pt-24 bg-slate-100">
        <div class="container -mb-16">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center">
                    {{-- <h4 class="font-semibold text-lg text-primary mb-2">Portofolio Kerja Sama & Training</h4> --}}
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Sarana & Prasarana</h2>
                    <p class="font-medium text-md text-secondary md:text-lg">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, aut.
                    </p>
                </div>
            </div>
        </div>
        <div class="container flex items-center justify-center h-screen -mt-16">
            <!-- Carousel Container -->
            <div class="relative w-full max-w-4xl overflow-hidden">
                <!-- Inner Carousel -->
                <div class="flex transition-transform duration-500 ease-in-out" id="carousel">
                    <!-- Slide 1 -->
                    <div class="min-w-1/3 flex-shrink-0 mx-2">
                        <img src="https://via.placeholder.com/400x300?text=Image+1" alt="Image 1"
                            class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                    <!-- Slide 2 -->
                    <div class="min-w-1/3 flex-shrink-0 mx-2">
                        <img src="https://via.placeholder.com/400x300?text=Image+2" alt="Image 2"
                            class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                    <!-- Slide 3 -->
                    <div class="min-w-1/3 flex-shrink-0 mx-2">
                        <img src="https://via.placeholder.com/400x300?text=Image+3" alt="Image 3"
                            class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                    <!-- Slide 4 -->
                    <div class="min-w-1/3 flex-shrink-0 mx-2">
                        <img src="https://via.placeholder.com/400x300?text=Image+4" alt="Image 4"
                            class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                    <!-- Slide 5 -->
                    <div class="min-w-1/3 flex-shrink-0 mx-2">
                        <img src="https://via.placeholder.com/400x300?text=Image+5" alt="Image 5"
                            class="w-full h-auto rounded-lg shadow-lg">
                    </div>
                </div>

                <!-- Navigation Buttons -->
                <button
                    class="absolute top-1/2 left-0 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full"
                    id="prev">
                    &lt;
                </button>
                <button
                    class="absolute top-1/2 right-0 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full"
                    id="next">
                    &gt;
                </button>
            </div>
        </div>
    </section>
    <!-- Portofolio Kerja Sama Section End -->
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
    <script>
        const carousel = document.getElementById('carousel');
        const next = document.getElementById('next');
        const prev = document.getElementById('prev');

        const slidesToShow = 3; // Jumlah gambar yang terlihat sejajar
        const slideWidth = 100 / slidesToShow; // Lebar masing-masing gambar dalam persen
        const totalSlides = carousel.children.length; // Total jumlah slide
        let currentIndex = 0;

        const updateCarousel = () => {
            const offset = (currentIndex * slideWidth) % (totalSlides * slideWidth);
            carousel.style.transform = `translateX(-${offset}%)`;
        };

        next.addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % totalSlides; // Geser ke kanan, kembali ke awal jika mentok
            updateCarousel();
        });

        prev.addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + totalSlides) %
            totalSlides; // Geser ke kiri, kembali ke akhir jika mentok
            updateCarousel();
        });
    </script>
@endsection
