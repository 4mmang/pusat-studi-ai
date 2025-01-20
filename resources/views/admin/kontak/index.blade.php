@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <p class="fs-2 mb-0" style="color: #38527E">Kelola Pesan dari Kontak</p>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
                <div class="table-responsive">
                    <table id="artikel" class="table table-sm text-center table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Nomor HP</th>
                                <th class="text-center">Pesan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kontak as $item)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $item->nama }}</td>
                                <td class="align-middle">{{ $item->email }}</td>
                                <td class="align-middle">{{ $item->nomor_hp }}</td>
                                <td class="align-middle">{{ $item->pesan }}</td>
                                <td class="align-middle">
                                    <form id="delete-kontak-{{ $item->id }}"
                                        action="{{ route('kontak.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="disableDeleteButton({{ $item->id }})"
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
            $('#artikel').DataTable();
        });
</script>
<script>
    function disableDeleteButton(id) {
            const button = document.querySelector(`#delete-kontak-${id} button`);
            button.disabled = true;
            button.innerHTML = `<i class="fas fa-spinner fa-spin"></i>`;
            document.querySelector(`#delete-kontak-${id}`).submit();
        }
</script>
@endpush