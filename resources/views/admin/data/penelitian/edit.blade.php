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
                                    <option @if ($penelitian->level == 'universitas') selected @endif value="Universitas">
                                        Universitas
                                    </option>
                                    <option @if ($penelitian->level == 'nasional') selected @endif value="Nasional">Nasional
                                    </option>
                                    <option @if ($penelitian->level == 'internasional') selected @endif value="Internasional">
                                        Internasional</option>
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
                                <div class="input-group mt-2">
                                    <input type="text" class="form-control" name="nama" id="nama">
                                    <button type="button" onclick="tambahAuthor()" class="btn text-white btn-primary"><i
                                            class="fas fa-plus"></i> Tambah</button>
                                </div>
                                @error('authors')
                                    <p id="author-error" class="mb-4">
                                        <span class="text-danger">Harap masukkan author</span>
                                    </p>
                                @enderror
                                <div id="authorList" class="mt-4">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="authors" id="authors">
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

        let authors = []
        let author = ["{{ $penelitian->authors }}"];
        let rawString = author[0];
        let jsonString = rawString.replace(/&quot;/g, '"');
        try {
            let authorArray = JSON.parse(jsonString);
            authorArray.forEach(element => {
                authors.push(element.nama)
            });
            renderAuthors()
        } catch (error) {
            console.error("Error parsing JSON:", error);
        }

        document.getElementById('authors').value = JSON.stringify(authors);

        // Fungsi untuk menambahkan author baru
        function tambahAuthor() {
            let nama = document.getElementById('nama');
            if (nama.value.trim() !== "") {
                authors.push(nama.value.trim());
                nama.value = "";

                // Perbarui nilai input hidden dengan daftar author dalam JSON
                document.getElementById('authors').value = JSON.stringify(authors);
                console.log(document.getElementById('authors').value);

                // Render ulang daftar author
                renderAuthors();

                if (authors.length > 0) {
                    let errorElement = document.getElementById('author-error');
                    if (errorElement) {
                        errorElement.remove();
                    }
                }
            } else {
                alert("Nama author tidak boleh kosong!");
            }
        }

        // Fungsi untuk merender daftar author
        function renderAuthors() {
            let authorList = document.getElementById('authorList');
            authorList.innerHTML = authors.map((a, index) => `
            ${index + 1}.
                    <span class="px-2 ms-1 rounded-4 text-white ${index === 0 ? 'bg-success' : 'bg-secondary'}">
                        ${a}
                    </span>
                    <a href="#" onclick="hapusAuthor(${index})">
                        <i class="fas fa-times-circle ms-2 text-danger"></i>
                    </a>
                    <br>
            `).join("");
        }

        // Fungsi untuk menghapus author
        function hapusAuthor(index) {
            authors.splice(index, 1); // Hapus author dari array
            document.getElementById('authors').value = JSON.stringify(authors); // Perbarui input hidden
            renderAuthors(); // Render ulang daftar author
            // if (authors.length > 1) {
            // }else{
            //     alert("Authot tidak boleh kosong")
            // }
        }

        
    </script>
@endpush
