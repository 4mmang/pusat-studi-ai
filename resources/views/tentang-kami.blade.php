@extends('layouts.app')
@section('content') 
<!-- About Section Start -->
<section id="tentang-kami" class="pt-36 pb-32">
    <div class="container">
        <div class="flex flex-wrap">
            <div class="w-full px-4 mb-10 lg:w-1/2">
                <h4 class="font-bold uppercase text-primary text-lg mb-3">Tentang Kami</h4>
                <h4 class="font-bold text-dark text-3xl mb-5 max-w-md lg:text-4xl">Lembaga Penelitian dan Pengbdian kepada Masyarakat</h4>
                <p class="font-medium text-base text-secondary max-w-xl lg:text-lg">Lorem ipsum dolor, sit amet
                    consectetur adipisicing elit. Vitae excepturi possimus, eum veniam voluptatem aperiam accusamus
                    quasi! Vero ipsum, minus incidunt facilis impedit, corrupti odit tempore obcaecati vel veritatis
                    sequi.</p>
            </div>

            <div class="w-full px-4 lg:w-1/2">
                <h3 class="font-semibold text-dark text-2xl mb-4 lg:text-3xl lg:pt-10">Pantau kami!</h3>
                <p class="font-medium text-base text-secondary mb-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, numquam.</p>
                <div class="flex items-center">
                    <a href="https://www.instagram.com/amm4ng?igsh=MWYxYnI1em9pOWUzcg=="
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                        <svg width="20" role="img" fill="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Instagram</title>
                            <path
                                d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                        </svg>
                    </a> 
                    <!-- Icon Twitter -->
                    <a href="https://twitter.com/your_twitter_handle"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                        <svg width="20" role="img" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>Twitter</title>
                            <path
                                d="M23.643 4.937c-.835.37-1.732.622-2.675.733a4.685 4.685 0 0 0 2.053-2.577 9.373 9.373 0 0 1-2.97 1.137 4.659 4.659 0 0 0-7.925 4.244 13.22 13.22 0 0 1-9.596-4.857 4.658 4.658 0 0 0 1.442 6.216 4.638 4.638 0 0 1-2.113-.584v.058a4.661 4.661 0 0 0 3.737 4.564 4.64 4.64 0 0 1-2.106.08 4.66 4.66 0 0 0 4.348 3.24 9.346 9.346 0 0 1-5.787 1.997A9.42 9.42 0 0 1 2 19.54a13.19 13.19 0 0 0 7.164 2.097c8.6 0 13.307-7.125 13.307-13.308 0-.2-.005-.4-.014-.598a9.523 9.523 0 0 0 2.32-2.414z" />
                        </svg>
                    </a>
                    
                    <!-- Icon Facebook -->
                    <a href="https://facebook.com/your_facebook_profile"
                        class="w-9 h-9 mr-3 rounded-full flex justify-center items-center border border-slate-300 text-slate-300 hover:border-primary hover:bg-primary hover:text-white">
                        <svg width="20" role="img" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <title>Facebook</title>
                            <path
                                d="M22.675 0H1.327C.593 0 0 .593 0 1.327v21.347C0 23.407.593 24 1.327 24H12.82v-9.294H9.692V10.75h3.128V8.413c0-3.1 1.893-4.787 4.658-4.787 1.325 0 2.465.099 2.796.143v3.24l-1.92.001c-1.504 0-1.794.715-1.794 1.76v2.307h3.588l-.467 3.956h-3.12V24h6.116c.734 0 1.327-.593 1.327-1.327V1.327C24 .593 23.407 0 22.675 0z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->
@endsection 