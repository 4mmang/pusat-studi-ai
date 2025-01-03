@extends('layouts.admin.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <p class="fs-2 mb-0" style="color: #38527E">Edit Data</p>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
                <form id="dipercaya-edit" action="{{ route('dipercaya.update', $dipercaya->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama">Nama <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control @error('nama')
                                    is-invalid
                                @enderror" name="nama" value="{{ $dipercaya->nama }}" id="nama" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="logo">Logo <sup class="text-danger"></sup></label>
                            <input type="file" class="form-control @error('logo')
                                    is-invalid
                                @enderror" name="logo" id="logo">
                        </div>
                    </div>

                    <a href="{{ route('dipercaya.index') }}" class="btn btn-danger float-end mt-3 ml-2">Kembali</a>
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
    let form = document.getElementById('dipercaya-edit')
        form.addEventListener('submit', function() {
            let btnSave = document.getElementById('simpan')
            btnSave.disabled = true
            btnSave.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
        })
</script>
@endpush