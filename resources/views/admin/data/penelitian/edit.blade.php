@extends('layouts.admin.master')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <p class="fs-2 mb-0" style="color: #38527E">Edit Data Penelitian</p>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <form id="penelitian-baru" action="{{ route('penelitian.update', $penelitian->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="judul">Judul <sup class="text-danger">*</sup></label>
                                <input type="text" value="{{ $penelitian->judul }}" autofocus
                                    class="form-control @error('judul')
                                    is-invalid
                                @enderror"
                                    name="judul" id="judul" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="penyelenggara" class="">Nama Penyelenggara <sup
                                        class="text-danger">*</sup></label>
                                <input type="text" value="{{ $penelitian->penyelenggara }}"
                                    class="form-control @error('penyelenggara')
                                    is-invalid
                                @enderror"
                                    name="penyelenggara" id="penyelenggara" required>
                            </div>
                            {{-- <div class="col-md-6 mb-3">
                            <label for="jenis_penelitian" class="">Jenis penelitian <sup
                                    class="text-danger">*</sup></label>
                            <select name="jenis_penelitian" value="{{ old('jenis_penelitian') }}" class="form-control"
                                id="jenis_penelitian" required>
                                @foreach ($jenispenelitian as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->nama }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_penelitian" class="">Tanggal Penelitian <sup
                                        class="text-danger">*</sup></label>
                                <input type="date" value="{{ $penelitian->tanggal_penelitian }}"
                                    class="form-control @error('tanggal_penelitian')
                                    is-invalid
                                @enderror"
                                    name="tanggal_penelitian" id="tanggal_penelitian" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="level" class="">Level <sup class="text-danger">*</sup></label>
                                <select name="level" class="form-control" value="{{ old('level') }}" id="level"
                                    required>
                                    <option @if ($penelitian->level == 'mandiri') selected @endif value="Mandiri">
                                        Mandiri
                                    </option>
                                    <option @if ($penelitian->level == 'universitas') selected @endif value="Universitas">
                                        Universitas
                                    </option>
                                    <option @if ($penelitian->level == 'nasional') selected @endif value="Nasional">Nasional
                                    </option>
                                    <option @if ($penelitian->level == 'internasional') selected @endif value="Internasional">
                                        Internasional</option>
                                    <option @if ($penelitian->level == 'lainnya') selected @endif value="Lainnya">
                                        Lainnya</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="link_akses" class="">Link Akses Penelitian <sup
                                        class="text-danger">*</sup></label>
                                <input type="url" value="{{ $penelitian->link_akses }}"
                                    class="form-control @error('link_akses')
                                    is-invalid
                                @enderror"
                                    name="link_akses" id="link_akses" required>
                            </div>
                            <div class="col-md-5 mb-12">
                                Authors <sup class="text-danger">*</sup>
                                <select class="form-control mt-2 mb-3" name="anggota[]" id="anggota-select" multiple
                                    size="5">
                                    @foreach ($anggota as $ang)
                                        <option value="{{ $ang->id }}"
                                            @if (in_array($ang->id, $penelitian->authors->pluck('id')->toArray())) selected @endif>
                                            {{ $ang->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="nama" id="nama">
                                    <button type="button" onclick="tambahAuthor()" class="btn text-white btn-primary">
                                        <i class="fas fa-plus"></i> Tambah
                                    </button>
                                </div>
                                @error('authors')
                                    <p id="author-error" class="mb-4">
                                        <span class="text-danger">Harap masukkan author</span>
                                    </p>
                                @enderror
                                <div id="authorList" class="mt-4">
                                    <!-- Daftar authors akan dirender di sini -->
                                </div>
                            </div>
                            <input type="hidden" name="authors" id="authors">
                        </div>
                        {{-- <input type="hidden" name="authors" id="authors"> --}}
                        <a href="{{ route('penelitian.index') }}" class="btn btn-danger float-end mt-3 ml-2">Kembali</a>
                        <button id="simpan" type="submit" class="btn text-white mt-3 btn-success float-end px-3"><i
                                class="fas fa-save mr-1"></i>
                            Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        // Disable tombol simpan saat form dikirim
        let form = document.getElementById('penelitian-baru');
        form.addEventListener('submit', function() {
            let btnSave = document.getElementById('simpan');
            btnSave.disabled = true;
            btnSave.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
        });


        let author = @json($penelitian->authors); // Inisialisasi dengan data penulis yang sudah ada
        // Menambahkan nama dari select
        let select = document.getElementById('anggota-select');
        select.addEventListener('change', function() {
            Array.from(select.selectedOptions).forEach(option => {
                let user_id = parseInt(option.value, 10); // 10 adalah basis desimal
                let nama = option.text;

                // Periksa apakah sudah ada di daftar author
                if (!author.some(a => a.user_id === user_id)) {
                    author.push({
                        user_id,
                        nama
                    }); // Tambahkan data dengan ID
                }
            });

            // Perbarui input hidden dan render ulang daftar
            document.getElementById('authors').value = JSON.stringify(author);
            renderAuthors();
        });

        // Menambahkan nama secara manual
        function tambahAuthor() {
            let nama = document.getElementById('nama');
            if (nama.value.trim() !== "") { // Pastikan input tidak kosong
                author.push({
                    user_id: null,
                    nama: nama.value.trim()
                }); // Tambahkan nama dengan id null
                nama.value = ""; // Reset input

                // Perbarui nilai input hidden
                document.getElementById('authors').value = JSON.stringify(author);

                // Render ulang daftar author
                renderAuthors();
            } else {
                alert("Nama author tidak boleh kosong!");
            }
        }

        // Menghapus author dari daftar
        function hapusAuthor(index) {
            author.splice(index, 1); // Hapus author berdasarkan index
            document.getElementById('authors').value = JSON.stringify(author);
            renderAuthors();
        }

        // Merender daftar author
        function renderAuthors() {
            document.getElementById('authors').value = JSON.stringify(author);
            let authorList = document.getElementById('authorList');
            authorList.innerHTML = author.map((a, index) => `
        ${index + 1}.
        <span class="px-2 ms-1 rounded-4 text-white ${index === 0 ? 'bg-success' : 'bg-secondary'}">
            ${a.nama}
        </span>
        <a href="#" onclick="hapusAuthor(${index})">
            <i class="fas fa-times-circle ms-2 text-danger"></i>
        </a>
        <br>
        `).join("");
        }

        // Menyimpan data authors ke input hidden ketika halaman pertama kali dimuat
        document.addEventListener('DOMContentLoaded', function() {
            renderAuthors();
        });
    </script>
@endpush
