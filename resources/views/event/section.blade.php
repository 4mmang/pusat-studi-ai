<section id="beranda" class="pt-24 pb-32 bg-slate-100">
    <div class="container">
        <div class="flex flex-wrap lg:flex-nowrap text-center">
            <div class="w-full self-center px-4">
                <h4 class="font-semibold text-3xl text-primary mb-2">Event</h4>
                <h2 class="font-medium text-slate-500 text-lg mb-5 lg:text-2xl">
                    <span class="text-dark">Event yang diselenggarakan oleh Pusat Studi Artificial Intelligence</span>
                </h2>
            </div>
        </div>
        <div class="w-full px-4 flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
            @forelse ($events as $event)
            <div class="mb-12 p-4 md:w-1/3">
                <div class="rounded-md overflow-hidden flex justify-center">
                    <img src="{{ asset('storage/' . $event->poster) }}" class="h-auto rounded-xl" alt="Platform DATAU"
                        width="w-full">
                </div>
                <h3 class="font-semibold text-md flex justify-center text-dark mt-2 mb-3">
                    <a href="{{ $event->link_pendaftaran }}" target="_blank"
                        class="p-3 px-5 py-3 bg-primary text-white rounded-full">Daftar Sekarang</a>
                </h3>
            </div>
            @empty
            <p>Belum ada</p>
            @endforelse
        </div>
    </div>
</section>