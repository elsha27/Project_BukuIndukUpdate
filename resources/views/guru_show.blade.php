@extends('layouts.app_sneat', ['title' => 'Detail Data Guru'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">DATA GURU {{ strtoupper($guru->nama_guru) }}</div>
                    <div class="card-body">
                        <table width="100%">
                            <tbody>
                                <tr>
                                    <a href="{{ Storage::url($guru->foto) }}">
                                        <img src="{{ Storage::url($guru->foto) }}" alt="Foto Guru" class="img-thumbnail mt-2"
                                            style="width: 200px">
                                    </a>
                                </tr>
                                <tr>
                                    <th width="15%">Nama Guru</th>
                                    <td> : {{ $guru->nama_guru }}</td>
                                </tr>
                                <tr>
                                    <th>NIK</th>
                                    <td> : {{ $guru->nik }}</td>
                                </tr>
                                <tr>
                                    <th>NUPTK</th>
                                    <td> : {{ $guru->nuptk }}</td>
                                </tr>
                                <tr>
                                    <th>Status Kepegawaian</th>
                                    <td> : {{ $guru->status_kepegawaian }}</td>
                                </tr>
                                <tr>
                                    <th>NIP</th>
                                    <td> : {{ $guru->nip }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td> : {{ $guru->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th>Tempat Lahir</th>
                                    <td> : {{ $guru->tempat_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td> : {{ $guru->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor HP</th>
                                    <td> : {{ $guru->no_hp }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td> : {{ $guru->email }}</td>
                                </tr>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <td> : {{ $guru->mapel }}</td>
                                </tr>
                                <tr>
                                    <th>Total JTM</th>
                                    <td> : {{ $guru->total_jtm }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p></p>
                        <h4><b>Dokumen Guru</b></h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Dokumen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ijazah SD</td>
                                    <td>
                                        @if ($guru->ijazah_sd)
                                            <a href="{{ Storage::url($guru->ijazah_sd) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ijazah SMP</td>
                                    <td>
                                        @if ($guru->ijazah_smp)
                                            <a href="{{ Storage::url($guru->ijazah_smp) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ijazah SMA</td>
                                    <td>
                                        @if ($guru->ijazah_sma)
                                            <a href="{{ Storage::url($guru->ijazah_sma) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ijazah S1</td>
                                    <td>
                                        @if ($guru->ijazah_s1)
                                            <a href="{{ Storage::url($guru->ijazah_s1) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Ijazah S2</td>
                                    <td>
                                        @if ($guru->ijazah_s2)
                                            <a href="{{ Storage::url($guru->ijazah_s2) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Kartu Keluarga</td>
                                    <td>
                                        @if ($guru->kartukeluarga)
                                            <a href="{{ Storage::url($guru->kartukeluarga) }}" target="_blank">Lihat
                                                File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>KTP</td>
                                    <td>
                                        @if ($guru->ktp)
                                            <a href="{{ Storage::url($guru->ktp) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                                    </td>
                                </tr>

                                @foreach ($skGurus as $sk)
                                <tr>
                                    <td>{{ $sk->jenis_sk }} - {{ $sk->tahun }}</td>
                                    <td>
                                        @if ($sk->doc_sk)
                                            <a href="{{ Storage::url($sk->doc_sk) }}" target="_blank">Lihat File</a>
                                        @else
                                            Tidak ada file
                                        @endif
                            
                                        <!-- Tombol Delete -->
                                        <form action="{{ route('skguru.destroy', $sk->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus SK ini?')">Hapus</button>
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
@endsection
