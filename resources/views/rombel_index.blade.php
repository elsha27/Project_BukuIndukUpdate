@extends('layouts.app',['title' => 'Data Rombel'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Rombongan Belajar</h5>
        <div class="card-body">
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="/rombel/create" class="btn btn-primary btn">Tambah Siswa</a>
                    <form action="/rombel" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file">
                        <input type="submit" name="Import">
                    </form>
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
                    @foreach ($rombel as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->tingkat_rombel }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>
                            <a href="/siswa/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>
                            <!-- link ke form siswa edit menyesuaikan id -->
                            <form action="/siswa/{{ $item->id }}" method="POST" class="d-inline">
                            <!-- form action sesuai dengan id yang diambil -->
                            <a href="/siswa/{{ $item->id }}" class="btn btn-success btn-sm ml-2">Detail</a>
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm ml-2" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $rombel->links() !!}
        </div>
    </div>
@endsection
