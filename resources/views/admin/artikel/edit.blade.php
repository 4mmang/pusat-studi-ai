@extends('layouts.admin.master')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <p class="fs-2 mb-0" style="color: #38527E">Edit Artikel</p>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <form id="artikel-baru" action="{{ route('artikel.update', $artikel->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="judul">Judul <sup class="text-danger">*</sup></label>
                                <input type="text" value="{{ $artikel->judul }}"
                                    class="form-control @error('judul')
                                    is-invalid
                                @enderror"
                                    name="judul" id="judul" required>
                            </div>
                            <div class="col-md-6">
                                <label for="sampul" class="">Sampul <sup class="text-danger"></sup></label>
                                <input type="file"
                                    class="form-control @error('sampul')
                                    is-invalid
                                @enderror"
                                    name="sampul" id="sampul">
                            </div>
                        </div>

                        <label for="konten" class="mt-3">Isi Artikel <sup class="text-danger">*</sup></label>
                        <textarea name="konten" class="form-control" id="konten" cols="30" rows="10" required>{{ $artikel->konten }}</textarea>
                        <a href="{{ route('artikel.index') }}" class="btn btn-danger float-end mt-3 ml-2">Kembali</a>
                        <button id="simpan" type="submit" style="background-color: #38527E"
                            class="btn text-white mt-3 float-end px-4"><i class="fas fa-save mr-1"></i>
                            Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('#konten').summernote({
            placeholder: 'Masukkan konten artikel',
            tabsize: 2,
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
            ]
        })
    </script>
    <script>
        let form = document.getElementById('artikel-baru')
        form.addEventListener('submit', function() {
            let btnSave = document.getElementById('simpan')
            btnSave.disabled = true
            btnSave.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
        })
    </script>
@endpush
