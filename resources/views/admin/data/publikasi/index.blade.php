@extends('layouts.admin.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <p class="fs-2 mb-0" style="color: #38527E">Publikasi</p>
            <a href="{{ route('publikasi.create') }}" class="btn mt-3 btn-primary text-white"><i class="fas fa-plus"></i>
                Tambah
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
                                    <th class="text-center">Authors</th>
                                    <th class="text-center">Tahun</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($publikasi as $pub)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $pub->judul }}</td>
                                        <td class="align-middle">
                                            @foreach ($pub->authors as $author)
                                                {{ $author->nama }}<sup>{{ $loop->iteration }}</sup>
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::parse($pub->tanggal_publikasi)->format('Y') }}</td>
                                        <td class="align-middle">
                                            <form id="delete-article-{{ $pub->id }}"
                                                action="{{ route('publikasi.destroy', $pub->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ $pub->link_akses }}" class="btn btn-primary btn-sm mb-1"><i
                                                        class="fas fa-eye"></i></a>
                                                @if ($pub->user_id === Auth::user()->id || Auth::user()->role === 'admin')
                                                    <a href="{{ route('publikasi.edit', $pub->id) }}"
                                                        class="btn btn-warning btn-sm mb-1 ml-1"><i
                                                            class="fas fa-pen"></i></a>
                                                    <button type="submit"
                                                        onclick="disableDeleteButton({{ $pub->id }})"
                                                        class="ml-1 btn btn-sm btn-danger mb-1 text-center"><i
                                                            class="fas fa-trash"></i></button>
                                                @endif
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
