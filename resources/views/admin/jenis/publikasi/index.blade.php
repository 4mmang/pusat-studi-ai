@extends('layouts.admin.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <p class="fs-2 mb-0" style="color: #38527E">Kelola Jenis Publikasi</p>
            <a href="#" data-toggle="modal" data-target="#tambah-jenis" style="background-color: #38527E"
                class="btn mt-3 text-white">Tambah
                Jenis</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="table-responsive">
                        <table id="jenis-publikasi" class="table table-sm text-center table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama Jenis Publikasi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenisPublikasi as $publikasi)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $publikasi->nama }}</td>
                                        <td class="align-middle">
                                            <form id="delete-jenis-{{ $publikasi->id }}"
                                                action="{{ route('jenis.publikasi.destroy', $publikasi->id) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="#"
                                                    onclick="edit({{ $publikasi->id }}, '{{ $publikasi->nama }}')"
                                                    class="btn btn-warning btn-sm mb-1" data-toggle="modal"
                                                    data-target="#edit-jenis"><i class="fas fa-pen"></i></a>
                                                <button type="submit" onclick="disableDeleteButton({{ $publikasi->id }})"
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

    {{-- modal tambah jenis publikasi --}}
    <div class="modal fade" id="tambah-jenis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="jenis-baru" action="{{ route('jenis.publikasi.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Publikasi</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="">Nama jenis publikasi <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="simpan" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal edit jenis publikasi --}}
    <div class="modal fade" id="edit-jenis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="jenis-edit" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Jenis Publikasi</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="">Nama jenis publikasi <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" name="nama_baru" id="nama_baru" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" id="update" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#jenis-publikasi').DataTable();
        });
    </script>

    <script>
        let form = document.getElementById('jenis-baru')
        form.addEventListener('submit', function() {
            let btnSave = document.getElementById('simpan')
            btnSave.disabled = true
            btnSave.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
        })

        let formEdit = document.getElementById('jenis-edit')
        formEdit.addEventListener('submit', function() {
            let btnupdate = document.getElementById('update')
            btnupdate.disabled = true
            btnupdate.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Processing...';
        })
    </script>

    <script>
        function edit(id, nama) {
            document.getElementById('nama_baru').value = nama
            document.getElementById('jenis-edit').action = "{{ route('jenis.publikasi.update', ':id') }}".replace(':id', id)
        }

        function disableDeleteButton(id) {
            const button = document.querySelector(`#delete-jenis-${id} button`);
            button.disabled = true;
            button.innerHTML = `<i class="fas fa-spinner fa-spin"></i>`;
            document.querySelector(`#delete-jenis-${id}`).submit();
        }
    </script>
@endpush
