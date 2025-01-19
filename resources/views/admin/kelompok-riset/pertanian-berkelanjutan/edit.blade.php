@extends('layouts.admin.master')
@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <p class="fs-2 mb-0" style="color: #38527E">Tambah Rekan Jejak Riset Pertanian Berkelanjutan</p>
        </div>
        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <form id="pertanian-edit" action="{{ route('pertanian.update', $pertanianBerkelanjutan->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="tahun">Tahun <sup class="text-danger">*</sup></label>
                                <input type="number" value="{{ $pertanianBerkelanjutan->tahun }}"
                                    class="form-control @error('tahun')
                                    is-invalid
                                @enderror"
                                    name="tahun" id="tahun" required>
                            </div>
                        </div>

                        <label for="keterangan" class="mt-3">Keterangan <sup class="text-danger">*</sup></label>
                        <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="5" required>{{ $pertanianBerkelanjutan->keterangan }}</textarea>
                        <a href="{{ route('pertanian.index') }}" class="btn btn-danger float-end mt-3 ml-2">Kembali</a>
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
        let form = document.getElementById('pertanian-edit')
        form.addEventListener('submit', function() {
            let btnSave = document.getElementById('simpan')
            btnSave.disabled = true
            btnSave.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
        })
    </script>
@endpush
