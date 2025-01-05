@extends('layouts.admin.master')
@section('content')
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <p class="fs-2 mb-0" style="color: #38527E">Profil Saya</p>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3 shadow-sm">
                    <div class="row">
                        <div class="col-md-3">
                            @if (!$user->foto)
                                <img src="{{ asset('img/Avatar-Profile-PNG-Free-Image.png') }}" class="img-fluid"
                                    alt="">
                            @else
                                <img src="{{ asset('storage/' . $user->foto) }}" class="img-fluid" alt="">
                            @endif
                        </div>
                        <div class="col-md-9 mt-2">
                            <form id="update-profil" action="{{ route('profil.update', Auth::user()->id) }}" method="post">
                                @csrf
                                @method('put')
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <th>Nama</th>
                                        <td>
                                            <input value="{{ $user->nama }}" name="nama" type="text"
                                                class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            <input value="{{ $user->email }}" name="email" type="email"
                                                class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>NIP</th>
                                        <td>
                                            <input value="{{ $user->nip }}" name="nip" type="text"
                                                class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Telepon</th>
                                        <td>
                                            <input value="{{ $user->nomor_hp }}" name="nomor_hp" type="number"
                                                class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jenis kelamin</th>
                                        <td>
                                            <select name="jenis_kelamin" class="form-control" id="">
                                                <option value="lk" @if ($user->jenis_kelamin === 'lk') selected @endif>
                                                    Laki - laki</option>
                                                <option value="pr" @if ($user->jenis_kelamin === 'pr') selected @endif>
                                                    Perempuan</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>

                                        <td>
                                            <textarea name="alamat" class="form-control" id="" cols="30" rows="3">{{ $user->alamat }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-end">
                                            <button type="submit" id="simpan" class="btn btn-primary mt-4"><i
                                                    class="fas fa-save"></i>
                                                Simpan</button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        let form = document.getElementById('update-profil')
        form.addEventListener('submit', function() {
            let btnSave = document.getElementById('simpan')
            btnSave.disabled = true
            btnSave.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
        })
    </script>
@endpush
