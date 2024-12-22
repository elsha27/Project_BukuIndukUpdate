@extends('layouts.app', ['title' => 'Detail Data Rombel'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">DATA ROMBEL {{ strtoupper($rombel->nama_rombel) }}</div>
                    <div class="card-body">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <th width="15%">Nama Rombel</th>
                                    <td> : {{ $rombel->nama_rombel }}</td>
                                </tr>
                                <tr>
                                    <th>Tingkat</th>
                                    <td> : {{ $rombel->tingkat }}</td>
                                </tr>
                                <tr>
                                    <th>Wali Kelas</th>
                                    <td> : {{ $rombel->nik }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Ruangan</th>
                                    <td> : {{ $rombel->nama_ruangan }}</td>
                                </tr>
                                <tr>
                                    <th>Semester</th>
                                    <td> : {{ $rombel->semester }}</td>
                                </tr>
                                <tr>
                                    <th>Tahun Ajaran</th>
                                    <td> : {{ $rombel->tahun_ajaran }}</td>
                                </tr>

                                <p></p>
                                <h4><b>Daftar Siswa</b></h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Nama Siswa</th>
                                            <th>NISN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rombel->siswa as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td> <!-- Menampilkan nama siswa -->
                                                <td>{{ $item->nisn }}</td> <!-- Menampilkan NISN siswa -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
