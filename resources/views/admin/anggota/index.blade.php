@extends('layouts.admin.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <p class="fs-2 mb-0" style="color: #38527E">Kelola Anggota</p>
            <a href="{{ route('anggota.create') }}" style="background-color: #38527E" class="btn mt-3 text-white"><i
                    class="fas fa-plus"></i> Tambah
                Anggota</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="table-responsive">
                        <table id="anggota" class="table table-sm text-center table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Foto</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($anggota as $ang)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">
                                            @if ($ang->foto)
                                                <img src="{{ asset('storage/' . $ang->foto) }}" style="width: 100px"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('img/Avatar-Profile-PNG-Free-Image.png') }}" style="width: 80px"
                                                    alt="">
                                            @endif
                                        </td>
                                        <td class="align-middle">{{ $ang->nama }}</td>
                                        <td class="align-middle">
                                            <form id="delete-anggota-{{ $ang->id }}"
                                                action="{{ route('anggota.destroy', $ang->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('anggota.edit', $ang->id) }}"
                                                    class="btn btn-warning btn-sm mb-1"><i class="fas fa-pen"></i></a>
                                                <button type="submit" onclick="disableDeleteButton({{ $ang->id }})"
                                                    class="ml-1 btn btn-sm btn-danger mb-1 text-center"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#anggota').DataTable();
        });
    </script>
    <script>
        function disableDeleteButton(id) {
            const button = document.querySelector(`#delete-anggota-${id} button`);
            button.disabled = true;
            button.innerHTML = `<i class="fas fa-spinner fa-spin"></i>`;
            document.querySelector(`#delete-anggota-${id}`).submit();
        }
    </script>
@endpush