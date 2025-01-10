@extends('layouts.admin.master')
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <p class="fs-2 mb-0" style="color: #38527E">Unduh Data</p>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
                <form id="unduh" action="{{ route('unduh-data.store') }}"  method="post">
                    @csrf
                    <div class="row"> 
                        <div class="col-md-6">
                            <label for="">Ukuran</label>
                            <select name="" class="form-control" id="">
                                <option value="A4">A4</option>
                                <option value="letter">Letter</option>
                                <option value="A3">A3</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="orientasi">Orientasi</label>
                            <select name="orientasi" class="form-control" id="">
                                <option value="potrait">Potrait</option>
                                <option value="landscape">Lanscape</option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-primary mt-4" id="simpan"><i class="fas fa-download"></i> Unduh</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    let form = document.getElementById('unduh')
        form.addEventListener('submit', function() {
            let btnSave = document.getElementById('simpan')
            setTimeout(() => {
                btnSave.disabled = true
                btnSave.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
            }, 3000);
        })
</script>
@endpush