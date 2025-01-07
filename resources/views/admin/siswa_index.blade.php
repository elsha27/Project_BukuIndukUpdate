@extends('layouts.app_sneat_admin', ['title' => 'Data Siswa'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Siswa</h5>
        <div class="card-body">
            <div class="row mb-3 mt-3">
                <div class="col-md-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/admin/siswa/create" class="btn btn-primary">Tambah Siswa</a>

                        <form action="/admin/siswa" method="post" enctype="multipart/form-data" class="d-flex">
                            @csrf
                            <div class="input-group">
                                <input type="file" name="file" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload" />
                                <button class="btn btn-outline-primary" type="submit" name="Import"
                                    id="inputGroupFileAddon04">Import Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Siswa</th>
                        <th>NISN</th>
                        <th>Tingkat-Rombel</th>
                        <th>Status</th>
                        <th>Jenis Kelamin</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nisn }}</td>
                            <td>{{ $item->rombel->nama_rombel }}</td> <!-- Menampilkan nama guru -->
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>
                                <a href="/admin/siswa/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>
                                <!-- link ke form siswa edit menyesuaikan id -->
                                <form action="/admin/siswa/{{ $item->id }}" method="POST" class="d-inline">
                                    <!-- form action sesuai dengan id yang diambil -->
                                    <a href="/admin/siswa/{{ $item->id }}/show" class="btn btn-success btn-sm ml-2">Detail</a>
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm ml-2"
                                        onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p></p>
            {!! $siswa->links() !!}
        </div>
    </div>
@endsection
