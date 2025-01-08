@extends('layouts.app_sneat_admin',['title' => 'Data User'])
@section('content')
    <div class="card">
        <h5 class="card-header">Data User</h5>
        <div class="card-body">
            <div class="row mb-3 mt-3">
                <div class="col-md-6">
                    <a href="/admin/user/create" class="btn btn-primary btn">Tambah User</a>
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>ID</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($User as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->id }}</td>
                        <td>
                            {{-- <a href="/admin/rombel/{{ $item->id }}/edit" class="btn btn-warning btn-sm ml-2">Edit</a> --}}
                            <!-- link ke form siswa edit menyesuaikan id -->
                            <form action="/admin/user/{{ $item->id }}" method="POST" class="d-inline">
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
            {{-- {!! $rombel->links() !!} --}}
        </div>
    </div>
@endsection
