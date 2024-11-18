@extends('layouts.pusat-studi.app')
@section('content')
<!-- Berita Section Start -->
<section id="portofolio" class="pt-32 pb-16">
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                {{-- <h4 class="font-semibold text-lg text-primary mb-2">Daftar</h4> --}}
                <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl mb-4">Artikel</h2>
                <p class="font-medium text-md text-secondary md:text-lg">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, aut.
                </p>
            </div>
        </div>

        <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
            <div class="mb-12 p-4 md:w-1/3">
                <div class="rounded-md shadow-md overflow-hidden">
                    <img src="https://picsum.photos/800/400?random=8" alt="Platform DATAU" width="w-full">
                </div>
                <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Dataset Collection Platform</h3>
                <p class="font-medium text-base text-secondary">This project is a web-based platform designed for
                    collecting and managing datasets. Built using Laravel as the back-end
                    framework, the platform efficiently handles data management and user authentication. The
                    front-end is developed using
                    Bootstrap for responsive design and jQuery to enhance interactivity and handle dynamic content.
                    The platform allows
                    users to upload, manage, and download datasets, providing an intuitive and user-friendly
                    interface.</p>
            </div>
            <div class="mb-12 p-4 md:w-1/3">
                <div class="rounded-md shadow-md overflow-hidden">
                    <img src="https://picsum.photos/800/400?random=7" alt="" width="w-full">
                </div>
                <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Musical Instrument Sales </h3>
                <p class="font-medium text-base text-secondary">This project is a web-based platform for selling
                    musical instruments, built using Laravel for the back-end, Bootstrap
                    for the front-end, and jQuery to enhance interactivity. The platform allows users to browse and
                    purchase musical
                    instruments with ease. It also features an integrated payment system using Midtrans, ensuring
                    secure and seamless
                    transactions.</p>
            </div>
            <div class="mb-12 p-4 md:w-1/3">
                <div class="rounded-md shadow-md overflow-hidden">
                    <img src="https://picsum.photos/800/400?random=6" alt="" width="w-full">
                </div>
                <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Realtime Chat </h3>
                <p class="font-medium text-base text-secondary">The Realtime Chat project is a Laravel-based web
                    application that uses Pusher to send real-time messages without needing
                    to refresh the page
            </div>
            <div class="mb-12 p-4 md:w-1/3">
                <div class="rounded-md shadow-md overflow-hidden">
                    <img src="https://picsum.photos/800/400?random=5" alt="" width="w-full">
                </div>
                <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Lorem ipsum dolor sit amet.</h3>
                <p class="font-medium text-base text-secondary">This project is a web-based Supplier Selection
                    Decision Support System built with Laravel, utilizing the Simple Additive
                    Weighting (SAW) method to assist in selecting the best supplier based on predefined criteria.
                </p>
            </div>
            <div class="mb-12 p-4 md:w-1/3">
                <div class="rounded-md shadow-md overflow-hidden">
                    <img src="https://picsum.photos/800/400?random=10" alt="" width="w-full">
                </div>
                <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Lorem, ipsum dolor sit amet consectetur
                    adipisicing.</h3>
                <p class="font-medium text-base text-secondary">This project is a web-based Supplier Selection
                    Decision Support System built with Laravel, utilizing the Simple Additive
                    Weighting (SAW) method to assist in selecting the best supplier based on predefined criteria.
                </p>
            </div>
            <div class="mb-12 p-4 md:w-1/3">
                <div class="rounded-md shadow-md overflow-hidden">
                    <img src="https://picsum.photos/800/400?random=11" alt="" width="w-full">
                </div>
                <h3 class="font-semibold text-xl text-dark mt-5 mb-3">Supplier Selection Decision Support System
                    using the SAW Method</h3>
                <p class="font-medium text-base text-secondary">This project is a web-based Supplier Selection
                    Decision Support System built with Laravel, utilizing the Simple Additive
                    Weighting (SAW) method to assist in selecting the best supplier based on predefined criteria.
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Berita Section End -->
@endsection