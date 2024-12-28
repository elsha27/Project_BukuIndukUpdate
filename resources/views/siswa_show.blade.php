@extends('layouts.app_sneat', ['title' => 'Detail Data Siswa'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">DATA SISWA {{ strtoupper($siswa->nama) }}</div>
                    <div class="card-body">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <a href="{{ Storage::url($siswa->foto) }}">
                                    <img src="{{ Storage::url($siswa->foto) }}" alt="Foto Siswa" class="img-thumbnail mt-2"
                                        style="width: 200px">
                                    </a>
                                </tr>
                                <tr>
                                    <th width="15%">Nama Siswa</th>
                                    <td> : {{ $siswa->nama }}</td>
                                </tr>
                                <tr>
                                    <th>NISN</th>
                                    <td> : {{ $siswa->nisn }}</td>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <td> : {{ $siswa->nik }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td> : {{ $siswa->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td> : {{ $siswa->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Tingkat Rombel</th>
                                    <td> : {{ $siswa->tingkat_rombel }}</td>
                                </tr>
                                <tr>
                                    <th>Umur</th>
                                    <td> : {{ $siswa->umur }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if ($siswa->status === 'Aktif')
                                            <span
                                                style="background-color: green; padding: 3px 8px; border-radius: 5px; display: inline-block; color: white;">
                                                {{ ucfirst($siswa->status) }}
                                            </span>
                                        @else
                                            {{ ucfirst($siswa->status) }}
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td> : {{ $siswa->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td> : {{ $siswa->alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor HP</th>
                                    <td> : {{ $siswa->no_hp }}</td>
                                </tr>
                                <tr>
                                    <th>Kebutuhan Khusus</th>
                                    <td> : {{ $siswa->kebutuhan_khusus }}</td>
                                </tr>
                                <tr>
                                    <th>Disabilitas</th>
                                    <td> : {{ $siswa->disabilitas }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor KIP</th>
                                    <td> : {{ $siswa->nomor_kip }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Ayah</th>
                                    <td> : {{ $siswa->nama_ayah }}</td>
                                </tr>
                                <tr>
                                    <th>Nama ibu</th>
                                    <td> : {{ $siswa->nama_ibu }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Wali</th>
                                    <td> : {{ $siswa->nama_wali }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p></p>
                        <h4><b>Dokumen Siswa</b></h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Dokumen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Kelas 1 SMT 1</td>
                                    <td>
                                        @if ($siswa->smt1)
                                            <a href="{{ Storage::url($siswa->smt1) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas 1 SMT 2</td>
                                    <td>
                                        @if ($siswa->smt2)
                                            <a href="{{ Storage::url($siswa->smt2) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas 2 SMT 1</td>
                                    <td>
                                        @if ($siswa->smt3)
                                            <a href="{{ Storage::url($siswa->smt3) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas 2 SMT 2</td>
                                    <td>
                                        @if ($siswa->smt4)
                                            <a href="{{ Storage::url($siswa->smt4) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas 3 SMT 1</td>
                                    <td>
                                        @if ($siswa->smt5)
                                            <a href="{{ Storage::url($siswa->smt5) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas 3 SMT 2</td>
                                    <td>
                                        @if ($siswa->smt6)
                                            <a href="{{ Storage::url($siswa->smt6) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas 4 SMT 1</td>
                                    <td>
                                        @if ($siswa->smt7)
                                            <a href="{{ Storage::url($siswa->smt7) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas 4 SMT 2</td>
                                    <td>
                                        @if ($siswa->smt8)
                                            <a href="{{ Storage::url($siswa->smt8) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas 5 SMT 1</td>
                                    <td>
                                        @if ($siswa->smt9)
                                            <a href="{{ Storage::url($siswa->smt9) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas 5 SMT 2</td>
                                    <td>
                                        @if ($siswa->smt10)
                                            <a href="{{ Storage::url($siswa->smt10) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas 6 SMT 1</td>
                                    <td>
                                        @if ($siswa->smt11)
                                            <a href="{{ Storage::url($siswa->smt11) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kelas 6 SMT 2</td>
                                    <td>
                                        @if ($siswa->smt12)
                                            <a href="{{ Storage::url($siswa->smt12) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ijazah</td>
                                    <td>
                                        @if ($siswa->ijazah)
                                            <a href="{{ Storage::url($siswa->ijazah) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
