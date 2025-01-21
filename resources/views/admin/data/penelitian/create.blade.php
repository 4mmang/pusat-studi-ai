@extends('layouts.admin.master')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <p class="fs-2 mb-0" style="color: #38527E">Tambah Data Penelitian</p>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <form id="penelitian-baru" action="{{ route('penelitian.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="judul">Judul <sup class="text-danger">*</sup></label>
                                <input type="text" value="{{ old('judul') }}" autofocus
                                    class="form-control @error('judul')
                                    is-invalid
                                @enderror"
                                    name="judul" id="judul" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="penyelenggara" class="">Nama Penyelenggara <sup
                                        class="text-danger">*</sup></label>
                                <input type="text" value="{{ old('penyelenggara') }}"
                                    class="form-control @error('penyelenggara')
                                    is-invalid
                                @enderror"
                                    name="penyelenggara" id="penyelenggara" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_penelitian" class="">Tanggal Penelitian <sup
                                        class="text-danger">*</sup></label>
                                <input type="date" value="{{ old('tanggal_penelitian') }}"
                                    class="form-control @error('tanggal_penelitian')
                                    is-invalid
                                @enderror"
                                    name="tanggal_penelitian" id="tanggal_penelitian" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="level" class="">Level <sup class="text-danger">*</sup></label>
                                <select name="level" class="form-control" value="{{ old('level') }}" id="level"
                                    required>
                                    <option value="Mandiri">Mandiri</option>
                                    <option value="Universitas">Universitas</option>
                                    <option value="Nasional">Nasional</option>
                                    <option value="Internasional">Internasional</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dana" class="">Dana yang Diperoleh (Rp)<sup
                                        class="text-danger">*</sup></label>
                                <input type="number" value="{{ old('dana') }}"
                                    class="form-control @error('dana')
                                                                is-invalid
                                                            @enderror"
                                    name="dana" id="dana" placeholder="Rp. 0" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="link_akses" class="">Link Akses Penelitian <sup
                                        class="text-danger">*</sup></label>
                                <input type="url" value="{{ old('link_akses') }}"
                                    class="form-control @error('link_akses')
                                    is-invalid
                                @enderror"
                                    name="link_akses" id="link_akses" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="anggota">Authors <sup class="text-danger">*</sup></label>
                                <!-- Dropdown multi-select -->
                                <select class="form-control mt-2 mb-3" name="anggota[]" id="anggota-select" multiple>
                                    @foreach ($anggota as $ang)
                                        <option value="{{ $ang->id }}">{{ $ang->nama }}</option>
                                    @endforeach
                                </select>
                                <!-- Input untuk menambah author manual -->
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="nama" id="nama"
                                        placeholder="Tambah author manual">
                                    <button type="button" onclick="tambahAuthor()" class="btn text-white btn-primary">
                                        <i class="fas fa-plus"></i> Tambah
                                    </button>
                                </div>

                                <!-- Error message -->
                                @error('authors')
                                    <p id="author-error" class="mb-4">
                                        <span class="text-danger">Harap masukkan author</span>
                                    </p>
                                @enderror

                                <!-- Daftar author -->
                                <div id="authorList" class="mt-4"></div>

                                <!-- Input hidden untuk menyimpan daftar author -->
                                <input type="hidden" name="authors" id="authors" value="[]">
                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="">Jenis Luaran<sup class="text-danger">*</sup></p>
                                <div>
                                    <input name="luaran[]" class="form-check-input border-1 border-dark ms-auto characteristic" type="checkbox"
                                    value="jurnal">
                                    <label class="form-check-label ms-4" for="flexCheckDefault">Jurnal</label>
                                </div>
                                <div>
                                    <input name="luaran[]" class="form-check-input border-1 border-dark ms-auto characteristic" type="checkbox"
                                    value="artikel">
                                    <label class="form-check-label ms-4" for="flexCheckDefault">Artikel</label>
                                </div>
                                <div>
                                    <input name="luaran[]" class="form-check-input border-1 border-dark ms-auto characteristic" type="checkbox"
                                    value="haki">
                                    <label class="form-check-label ms-4" for="flexCheckDefault">HaKI</label>
                                </div>
                                <div>
                                    <input name="luaran[]" class="form-check-input border-1 border-dark ms-auto characteristic" type="checkbox"
                                    value="berita">
                                    <label class="form-check-label ms-4" for="flexCheckDefault">Berita</label>
                                </div>
                                <div>
                                    <input name="luaran[]" class="form-check-input border-1 border-dark ms-auto characteristic" type="checkbox"
                                    value="alat">
                                    <label class="form-check-label ms-4" for="flexCheckDefault">Alat</label>
                                </div>
                                <div>
                                    <input name="luaran[]" class="form-check-input border-1 border-dark ms-auto characteristic" type="checkbox"
                                    value="lainnya">
                                    <label class="form-check-label ms-4" for="flexCheckDefault">Lainnya</label>
                                </div>
                            </div>
                        </div>
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

        let author = []; // Array untuk menyimpan daftar author

        // Menambahkan nama dari select
        let select = document.getElementById('anggota-select');
        select.addEventListener('change', function() {
            Array.from(select.selectedOptions).forEach(option => {
                let id = option.value;
                let nama = option.text;

                // Periksa apakah sudah ada di daftar author
                if (!author.some(a => a.id === id)) {
                    author.push({
                        id,
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
                    id: null,
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
    </script>
@endpush
