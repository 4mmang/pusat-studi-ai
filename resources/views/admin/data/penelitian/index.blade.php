@extends('layouts.admin.master')
@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <p class="fs-2 mb-0" style="color: #38527E">Penelitian</p>
            <a href="{{ route('penelitian.create') }}" class="btn mt-3 btn-primary text-white"><i class="fas fa-plus"></i>
                Tambah
                Penelitian</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card p-3">
                    <div class="table-responsive">
                        <table id="penelitian" class="table table-sm text-center table-bordered table-striped">
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
                                @foreach ($penelitian as $pen)
                                    <tr>
                                        <td class="align-middle">{{ $loop->iteration }}</td>
                                        <td class="align-middle">{{ $pen->judul }}</td>
                                        <td class="align-middle">
                                            @foreach ($pen->authors as $author)
                                             {{ $author->nama }}<sup>{{ $loop->iteration }}</sup> @if (!$loop->last)
                                                ,
                                            @endif
                                            @endforeach
                                        </td>
                                        <td class="align-middle">
                                            {{ \Carbon\Carbon::parse($pen->tanggal_penelitian)->format('Y') }}</td>
                                        <td class="align-middle">
                                            <form id="delete-penelitian-{{ $pen->id }}"
                                                action="{{ route('penelitian.destroy', $pen->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ $pen->link_akses }}" class="btn btn-primary btn-sm mb-1"><i
                                                        class="fas fa-eye"></i></a>
                                                @if ($pen->user_id === Auth::user()->id || Auth::user()->role === 'admin')
                                                    <a href="{{ route('penelitian.edit', $pen->id) }}"
                                                        class="btn btn-warning btn-sm mb-1 ml-1"><i
                                                            class="fas fa-pen"></i></a>
                                                    <button type="submit"
                                                        onclick="disableDeleteButton({{ $pen->id }})"
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
            $('#penelitian').DataTable();
        });
    </script>
    <script>
        function disableDeleteButton(id) {
            const button = document.querySelector(`#delete-penelitian-${id} button`);
            button.disabled = true;
            button.innerHTML = `<i class="fas fa-spinner fa-spin"></i>`;
            document.querySelector(`#delete-penelitian-${id}`).submit();
        }
    </script>
@endpush
