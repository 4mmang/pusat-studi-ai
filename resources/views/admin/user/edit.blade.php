@extends('layouts.admin.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <p class="fs-2 mb-0" style="color: #38527E">Edit Data Admin</p>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
                <form id="user-edit" action="{{ route('user.update', $user->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama">Nama Lengkap <sup class="text-danger">*</sup></label>
                            <input type="text" value="{{ $user->nama }}" class="form-control @error('nama')
                                    is-invalid
                                @enderror" name="nama" id="nama" required>
                        </div> 
                        <div class="col-md-6 mb-3">
                            <label for="email">Alamat Email <sup class="text-danger">*</sup></label>
                            <input type="email" value="{{ $user->email }}" class="form-control @error('email')
                                                                is-invalid
                                                            @enderror" name="email" id="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="jenis_kelamin">Jenis Kelamin <sup class="text-danger">*</sup></label>
                            <select name="jenis_kelamin" class="form-control" id="">
                                <option value="lk" @if ($user->jenis_kelamin == 'lk') selected @endif>Laki-laki
                                </option>
                                <option @if ($user->jenis_kelamin == 'pr') selected @endif value="pr">Perempuan
                                </option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password">Ganti Password <sup class="text-danger">*</sup></label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password">
                        </div>
                    </div>

                    <a href="{{ route('user.index') }}" class="btn btn-danger float-end mt-3 ml-2">Kembali</a>
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
    let form = document.getElementById('user-edit')
        form.addEventListener('submit', function() {
            let btnSave = document.getElementById('simpan')
            btnSave.disabled = true
            btnSave.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
        })
</script>
@endpush