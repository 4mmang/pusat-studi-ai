@extends('layouts.app')
@section('content')
    <!-- Kontak Section Start -->
    <section id="kontak" class="pt-32 pb-16">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-5">
                    <h2 class="font-bold text-3xl sm:text-4xl lg:text-5xl mb-4">Kontak</h2>
                </div>
            </div>

            <div class="w-full flex flex-wrap justify-center xl:w-10/12 xl:mx-auto">
                <div class="p-4 md:w-1/2 w-full">
                    <a
                        href="mailto:pusatstudiai@unsulbar.ac.id?subject=Pertanyaan tentang AI&body=Halo, saya ingin bertanya tentang program AI di Unsulbar.">
                        <div class="border p-6 shadow-lg bg-white flex items-center space-x-4">
                            <i class="fas fa-envelope text-xl border p-5 rounded-full bg-primary text-white"></i>
                            <div>
                                <p>Alamat Email</p>
                                <p>pusatstudiai@unsulbar.ac.id</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="p-4 md:w-1/2 w-full">
                    <a
                        href="https://wa.me/6285397638924?text=Hallo%20Pusat%20Studi%20Artificial%20Intelligence%20Unsulbar.%20Dapatkan%20anda%20Membantu%20saya?">
                        <div class="border p-6 shadow-lg bg-white flex items-center space-x-4">
                            <i class="fas fa-phone text-xl border p-5 rounded-full bg-primary text-white"></i>
                            <div>
                                <p>Telepon</p>
                                <p>+6285397638924</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="p-4 w-full">
                    @if (session('message'))
                        <p class="border py-2.5 w-full rounded-md bg-primary px-3 mb-3 text-white">{{ session('message') }}</p>
                    @endif
                    <div class="border p-6 shadow-lg bg-white flex items-center space-x-4">
                        <form class="w-full" id="pesan-baru" action="{{ route('buat-pesan') }}" method="post">
                            @csrf
                            <div class="flex flex-wrap space-y-4 md:space-y-0 md:flex-nowrap md:space-x-4">
                                <div class="mb-4 w-full md:w-1/3">
                                    <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
                                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap"
                                        class="shadow valid:border-green-500 appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        required>
                                </div>

                                <div class="mb-4 w-full md:w-1/3">
                                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                                    <input type="email" required id="email" name="email"
                                        placeholder="Masukkan alamat email"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>

                                <div class="mb-4 w-full md:w-1/3">
                                    <label for="nomor_hp" class="block text-gray-700 text-sm font-bold mb-2">No,
                                        Handphone:</label>
                                    <input type="number" required id="nomor_hp" name="nomor_hp"
                                        placeholder="Masukkan nomor handphone"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                </div>
                            </div>

                            <div class="mb-5 mt-4 w-full">
                                <label for="pesan" class="block text-gray-700 text-sm font-bold mb-2">Pesan:</label>
                                <textarea rows="6" required id="pesan" name="pesan" placeholder="Masukkan pesan"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            </div>
                            <button type="submit" id="simpan" class="border p-3 bg-primary text-white px-7 rounded-full"><i
                                    class="fal fa-paper-plane mr-1"></i>Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Kontak Section End -->
@endsection
@push('scripts')
    <script>
        let form = document.getElementById('pesan-baru')
        form.addEventListener('submit', function() {
            let btnSave = document.getElementById('simpan')
            btnSave.disabled = true
            btnSave.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
        })
    </script>
@endpush
