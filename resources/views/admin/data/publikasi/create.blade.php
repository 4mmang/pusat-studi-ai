@extends('layouts.admin.master')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <p class="fs-2 mb-0" style="color: #38527E">Tambah Data Publikasi</p>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <form id="publikasi-baru" action="{{ route('publikasi.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="judul">Judul <sup class="text-danger">*</sup></label>
                                <input type="text" autofocus
                                    class="form-control @error('judul')
                                    is-invalid
                                @enderror"
                                    name="judul" id="judul" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="sampul" class="">Nama Conf/Jurnal <sup
                                        class="text-danger">*</sup></label>
                                <input type="text"
                                    class="form-control @error('sampul')
                                    is-invalid
                                @enderror"
                                    name="sampul" id="sampul" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="sampul" class="">Jenis Publikasi <sup class="text-danger">*</sup></label>
                                <select name="" class="form-control" id="">
                                    <option value="">Laporan Penelitian</option>
                                    <option value="">Artikel Ilmiah</option>
                                    <option value="">Buku</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="sampul" class="">Tanggal Publikasi <sup class="text-danger">*</sup></label>
                                <input type="date"
                                    class="form-control @error('sampul')
                                    is-invalid
                                @enderror"
                                    name="sampul" id="sampul" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="sampul" class="">Level <sup class="text-danger">*</sup></label>
                                <select name="" class="form-control" id="">
                                    <option value="">Nasional</option>
                                    <option value="">Internasional</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-12 mt-2">
                                Authors:
                                <p class="text-sm">
                                    <span class="bg-success px-2 rounded-4 text-white">1. Wawan Firgiawan
                                    </span><a href=""><i class="fas fa-times-circle ms-2 text-danger"></i> </a>
                                    <br>
                                    <span class="bg-secondary px-2 rounded-4 text-white">2. Arman Umar
                                    </span><a href=""><i class="fas fa-times-circle ms-2 text-danger"></i> </a>
                                    <br>
                                    <span class="bg-secondary px-2 rounded-4 text-white">3. Muh. Parif
                                    </span><a href=""><i class="fas fa-times-circle ms-2 text-danger"></i> </a>
                                </p>
                                <a href="" class="btn text-white btn-primary"><i
                                        class="fas fa-plus"></i> Tambah Author</a>
                            </div>
                        </div>

                        <a href="{{ route('publikasi.index') }}" class="btn btn-danger float-end mt-3 ml-2">Kembali</a>
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
        let form = document.getElementById('publikasi-baru')
        form.addEventListener('submit', function() {
            let btnSave = document.getElementById('simpan')
            btnSave.disabled = true
            btnSave.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
        })
    </script>
@endpush
