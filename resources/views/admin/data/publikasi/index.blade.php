@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <p class="fs-2 mb-0" style="color: #38527E">Publikasi Saya</p>
        <a href="{{ route('publikasi.create') }}" class="btn mt-3 btn-primary text-white"><i class="fas fa-plus"></i> Tambah
            Publikasi</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
                <div class="table-responsive">
                    <table id="publikasi" class="table table-sm text-center table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Taggal</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publikasi as $pub)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $pub->judul }}</td>
                                <td class="align-middle">{{ $pub->tanggal_publikasi }}</td>
                                <td class="align-middle">
                                    <form id="delete-article-{{ $pub->id }}"
                                        action="{{ route('publikasi.destroy', $pub->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('publikasi.edit', $pub->id) }}"
                                            class="btn btn-warning btn-sm mb-1"><i class="fas fa-pen"></i></a>
                                        <button type="submit" onclick="disableDeleteButton({{ $pub->id }})"
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
            $('#publikasi').DataTable();
        });
</script>
<script>
    function disableDeleteButton(id) {
            const button = document.querySelector(`#delete-article-${id} button`);
            button.disabled = true;
            button.innerHTML = `<i class="fas fa-spinner fa-spin"></i>`;
            document.querySelector(`#delete-article-${id}`).submit();
        }
</script>
@endpush