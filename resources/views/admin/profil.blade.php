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
                            <table class="table table-borderless table-sm">
                                <tr>
                                    <th>Nama</th>
                                    <td>: {{ $user->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>: {{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>NIP</th>
                                    <td>: {{ $user->nip ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td>: {{ $user->nomor_hp ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis kelamin</th>
                                    <td>: {{ $user->jenis_kelamin == 'lk' ? 'Laki - laki' : 'Perempuan' }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: {{ $user->alamat ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="" class="btn btn-primary mt-3">Lengkapi Profil</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
