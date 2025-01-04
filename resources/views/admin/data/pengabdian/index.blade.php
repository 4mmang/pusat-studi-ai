@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <p class="fs-2 mb-0" style="color: #38527E">Pengabdian</p>
        <a href="{{ route('pengabdian.create') }}" class="btn mt-3 btn-primary text-white"><i class="fas fa-plus"></i>
            Tambah
            Pengabdian</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card p-3">
                <div class="table-responsive">
                    <table id="pengabdian" class="table table-sm text-center table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Authors</th>
                                <th class="text-center">Tahun</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengabdian as $pengab)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $pengab->judul }}</td>
                                <td class="align-middle">
                                    @foreach ($pengab->authors as $author)
                                    {{ $loop->iteration }}. {{ $author->nama }}@if (!$loop->last)
                                    ,
                                    @endif
                                    @endforeach
                                </td>
                                <td class="align-middle">{{ \Carbon\Carbon::parse($pengab->tanggal_pengabdian)->format('Y') }}</td>
                                <td class="align-middle">
                                    <form id="delete-pengabdian-{{ $pengab->id }}"
                                        action="{{ route('pengabdian.destroy', $pengab->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ $pengab->link_akses }}" class="btn btn-primary btn-sm mb-1"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('pengabdian.edit', $pengab->id) }}"
                                            class="btn btn-warning btn-sm mb-1 ml-1"><i class="fas fa-pen"></i></a>
                                        <button type="submit" onclick="disableDeleteButton({{ $pengab->id }})"
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
            $('#pengabdian').DataTable();
        });
</script>
<script>
    function disableDeleteButton(id) {
            const button = document.querySelector(`#delete-pengabdian-${id} button`);
            button.disabled = true;
            button.innerHTML = `<i class="fas fa-spinner fa-spin"></i>`;
            document.querySelector(`#delete-pengabdian-${id}`).submit();
        }
</script>
@endpush