@extends('layouts.app',['title' => 'Data Siswa'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data Siswa</h5>
        <div class="card-body">
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="/siswa/create" class="btn btn-primary btn">Tambah Siswa</a>
                    <form action="/siswa" method="post" enctype="multipart/form-data">
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
                        <th>NIK</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Tingkat-Rombel</th>
                        <th>Umur</th>
                        <th>Status</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Kebutuhan Khusus</th>
                        <th>Disabilitas</th>
                        <th>Nomor KIP/PIP</th>
                        <th>Nama Ayah Kandung</th>
                        <th>Nama Ibu Kandung</th>
                        <th>Nama Wali</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($siswa as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nisn }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->tempat_lahir }}</td>
                        <td>{{ $item->tanggal_lahir }}</td>
                        <td>{{ $item->tingkat_rombel }}</td>
                        <td>{{ $item->umur }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->kebutuhan_khusus }}</td>
                        <td>{{ $item->disabilitas }}</td>
                        <td>{{ $item->nomor_kip }}</td>
                        <td>{{ $item->nama_ayah }}</td>
                        <td>{{ $item->nama_ibu }}</td>
                        <td>{{ $item->nama_wali }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <a href="/siswa/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a>
                            <!-- link ke form siswa edit menyesuaikan id -->
                            <form action="/siswa/{{ $item->id }}" method="POST" class="d-inline">
                            <!-- form action sesuai dengan id yang diambil -->
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm ml-2" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $siswa->links() !!}
        </div>
    </div>
@endsection
