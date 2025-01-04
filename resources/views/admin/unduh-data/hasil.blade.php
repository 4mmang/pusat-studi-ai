<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Data Unduhan</title>
</head>

<body>
    <div class="row p-5">
        <div class="col-md-12 mt-3">
            <h2>Data Publikasi, Penelitian & Pengabdian</h2>
            <p class="mb-5">dari Pusat Studi <span class="text-primary">Artificial Intelligence</span></p>
            <h5>1. Data Publikasi</h5>
            <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered small align-middle text-center">
                    <thead class="text-center">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tahun</th>
                        <th>Level</th>
                        <th>Authors</th>
                    </thead>
                    <tbody>
                        @forelse ($publikasi as $pub)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $pub->judul }}</td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::parse($pub->tanggal_publikasi)->format('Y') }}</td>
                                <td class="align-middle text-capitalize">{{ $pub->level }}</td>
                                <td class="align-middle">
                                    @foreach ($pub->authors as $author)
                                        {{ $author->nama }} @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
        <div class="col-md-12 mt-3">
            <h5>2. Data Penelitian</h5>
            <div class="table-responsive">
                <table class="table table-sm table-striped text-center table-bordered small align-middle">
                    <thead class="text-center">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tahun</th>
                        <th>Level</th>
                        <th>Authors</th>
                    </thead>
                    <tbody>
                        @forelse ($penelitian as $pen)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $pen->judul }}</td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::parse($pen->tanggal_penelitian)->format('Y') }}</td>
                                <td class="align-middle text-capitalize">{{ $pen->level }}</td>
                                <td class="align-middle">
                                    @foreach ($pen->authors as $author)
                                        {{ $author->nama }} @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
        <div class="col-md-12 mt-3">
            <h5>3. Data Pengabdian</h5>
            <div class="table-responsive">
                <table class="table table-sm table-striped text-center table-bordered small align-middle">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tahun</th>
                            <th>Level</th>
                            <th>Authors</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengabdian as $pengab)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $pengab->judul }}</td>
                                <td class="align-middle">
                                    {{ \Carbon\Carbon::parse($pengab->tanggal_pengabdian)->format('Y') }}</td>
                                <td class="align-middle text-capitalize">{{ $pengab->level }}</td>
                                <td class="align-middle">
                                    @foreach ($pengab->authors as $author)
                                        {{ $author->nama }} @if (!$loop->last)
                                            ,
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>
