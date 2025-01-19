@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <p class="fs-2 mb-0" style="color: #38527E">Rekam Jejak Kelompok Riset Kebencanaan</p>
        <a href="{{ route('kebencanaan.create') }}" style="background-color: #38527E" class="btn mt-3 text-white"><i
                class="fas fa-plus"></i> Tambah</a>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
                <div class="table-responsive">
                    <table id="kebencanaan" class="table table-sm text-center table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tahun</th>
                                <th class="text-center">Keterangan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kebencanaan as $bencana)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $bencana->tahun }}</td>
                                <td class="align-middle">{{ $bencana->keterangan }}</td>
                                <td class="align-middle">
                                    <form id="delete-kebencanaan-{{ $bencana->id }}"
                                        action="{{ route('kebencanaan.destroy', $bencana->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('kebencanaan.edit', $bencana->id) }}"
                                            class="btn btn-warning btn-sm mb-1"><i class="fas fa-pen"></i></a>
                                        <button type="submit" onclick="disableDeleteButton({{ $bencana->id }})"
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
            $('#kebencanaan').DataTable();
        });
</script>
<script>
    function disableDeleteButton(id) {
            const button = document.querySelector(`#delete-kebencanaan-${id} button`);
            button.disabled = true;
            button.innerHTML = `<i class="fas fa-spinner fa-spin"></i>`;
            document.querySelector(`#delete-kebencanaan-${id}`).submit();
        }
</script>
@endpush