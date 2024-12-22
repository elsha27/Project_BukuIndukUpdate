@extends('layouts.app',['title' => 'Data Guru'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Guru</h5>
        <div class="card-body">
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="/guru/create" class="btn btn-primary btn">Tambah Guru</a>
                    {{-- <form action="/rombel" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file">
                        <input type="submit" name="Import">
                    </form> --}}
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Guru</th>
                        <th>NIK</th>
                        <th>Mata Pelajaran</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_guru }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->mapel }}</td>
                        <td>
                            <a href="/guru/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>
                            <!-- link ke form siswa edit menyesuaikan id -->
                            <form action="/guru/{{ $item->id }}" method="POST" class="d-inline">
                            <!-- form action sesuai dengan id yang diambil -->
                            <a href="/guru/{{ $item->id }}" class="btn btn-success btn-sm ml-2">Detail</a>
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm ml-2" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $guru->links() !!}
        </div>
    </div>
@endsection
