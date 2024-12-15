@extends('layouts.admin.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <p class="fs-2 mb-0" style="color: #38527E">Buat Event Baru</p>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
                <form id="event-baru" action="{{ route('event.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="judul">Judul <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('judul')
                                    is-invalid
                                @enderror" name="judul" id="judul" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="poster" class="">Poster <sup class="text-danger">*</sup></label>
                            <input type="file" class="form-control @error('poster')
                                    is-invalid
                                @enderror" name="poster" id="poster" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="link_pendaftaran" class="">Link Pendaftaran <sup class="text-danger">*</sup></label>
                            <input type="url" class="form-control @error('link_pendaftaran')
                                    is-invalid
                                @enderror" name="link_pendaftaran" id="link_pendaftaran" required>
                        </div>
                    </div>

                    <a href="{{ route('event.index') }}" class="btn btn-danger float-end mt-3 ml-2">Kembali</a>
                    <button id="simpan" type="submit" style="background-color: #38527E"
                        class="btn text-white mt-3 float-end px-4"><i class="fas fa-save mr-1"></i>
                        Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts') 
<script>
    let form = document.getElementById('event-baru')
        form.addEventListener('submit', function() {
            let btnSave = document.getElementById('simpan')
            btnSave.disabled = true
            btnSave.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
        })
</script>
@endpush