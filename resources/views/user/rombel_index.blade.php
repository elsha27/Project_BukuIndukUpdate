@extends('layouts.app_sneat_user',['title' => 'Data Rombel'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Rombongan Belajar</h5>
        <div class="card-body">
            {{-- <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="/rombel/create" class="btn btn-primary btn">Tambah Rombel</a>
                    <form action="/rombel" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file">
                        <input type="submit" name="Import">
                    </form>
                </div>
            </div> --}}
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Rombel</th>
                        <th>Tingkat</th>
                        <th>Wali Kelas</th>
                        <th>Nama Ruangan</th>
                        <th>Semester</th>
                        <th>Tahun Ajaran</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rombel as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_rombel }}</td>
                        <td>{{ $item->tingkat }}</td>
                        <td>{{ $item->guru->nama_guru ?? 'Nama Guru Tidak Ditemukan' }}</td> <!-- Menampilkan nama guru -->
                        <td>{{ $item->nama_ruangan }}</td>
                        <td>{{ $item->semester }}</td>
                        <td>{{ $item->tahun_ajaran }}</td>
                        <td>
                            <a href="/rombel/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>
                            <!-- link ke form siswa edit menyesuaikan id -->
                            <form action="/rombel/{{ $item->id }}" method="POST" class="d-inline">
                            <!-- form action sesuai dengan id yang diambil -->
                            <a href="user/rombel/{{ $item->id }}/show" class="btn btn-success btn-sm ml-2">Detail</a>
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm ml-2" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {!! $rombel->links() !!} --}}
        </div>
    </div>
@endsection
