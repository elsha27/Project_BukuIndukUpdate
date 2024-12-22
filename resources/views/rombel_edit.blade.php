@extends('layouts.app', ['title' => 'Edit Data Rombel'])
@section('content')
    <div class="card">
        <h5 class="card-header">Edit Data Siswa : <b>{{ strtoupper($rombel->nama_rombel) }}</b></h5>
        <!-- syntax blade yang digunakan untuk menampilkan data dari server ke halaman html dan mengubahnya jadi kapital (strtoupper) -->
        <div class="card-body">
            <form action="/rombel/{{ $rombel->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="rombel_id">ID Rombel</label>
                    <input type="number" class="form-control @error('rombel_id') is-invalid @enderror" id="rombel_id"
                        name="rombel_id" value="{{ old('rombel_id') ?? $rombel->rombel_id }}">
                    <span class="text-danger">{{ $errors->first('rombel_id') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_rombel">Nama Rombel</label>
                    <input type="text" class="form-control @error('nama_rombel') is-invalid @enderror" id="nama_rombel"
                        name="nama_rombel" value="{{ old('nama_rombel') ?? $rombel->nama_rombel }}">
                    <span class="text-danger">{{ $errors->first('nama_rombel') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tingkat">Tingkat</label>
                    <input type="number" class="form-control @error('tingkat') is-invalid @enderror" id="tingkat"
                        name="tingkat" value="{{ old('tingkat') ?? $rombel->tingkat }}">
                    <span class="text-danger">{{ $errors->first('tingkat') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nik">Wali Kelas
                        <a href="/guru/create" target="blank">Buat Guru Baru</a>
                    </label>
                    <select name="nik" class="form-control select2" data-placeholder="Cari Guru....">
                        <option value="">-- Pilih Guru --</option>
                        @foreach ($guru as $item)
                            <option value="{{ $item->nik }}" @selected(old('nik') == $item->nik)>
                                {{ $item->nik }} - {{ $item->nama_guru }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_ruangan">Nama Ruangan</label>
                    <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" id="nama_ruangan"
                        name="nama_ruangan" value="{{ old('nama_ruangan') ?? $rombel->nama_ruangan }}">
                    <span class="text-danger">{{ $errors->first('nama_ruangan') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="semester">Semester</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="semester" id="Ganjil" value="Ganjil"
                            {{ old('semester') ?? $rombel->semester === 'Ganjil' ? 'checked' : '' }}>
                        <label for="Ganjil" class="form-check-label">Ganjil</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="semester" id="Genap" value="Genap"
                            {{ old('semester') ?? $rombel->semester === 'Genap' ? 'checked' : '' }}>
                        <label for="Genap" class="form-check-label">Genap</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('semester') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tahun_ajaran">Tahun Ajaran</label>
                    <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran"
                        name="tahun_ajaran" value="{{ old('tahun_ajaran') ?? $rombel->tahun_ajaran }}">
                    <span class="text-danger">{{ $errors->first('tahun_ajaran') }}</span>
                </div>
                {{-- <div class="form-group mt-1 mb-3">
                    <label for="nisn">Pilih Siswa:</label>
                    <select name="nisn[]" id="nisn" multiple>
                        <!-- Siswa yang belum memiliki rombel -->
                        @foreach ($siswaTanpaRombel as $siswa)
                            <option value="{{ $siswa->nisn }}">{{ $siswa->nama }} ({{ $siswa->nisn }})</option>
                        @endforeach

                        <!-- Siswa yang sudah di rombel ini (untuk tetap dipilih) -->
                        @foreach ($siswaRombel as $siswa)
                            <option value="{{ $siswa->nisn }}" selected>{{ $siswa->nama }} ({{ $siswa->nisn }})
                            </option>
                        @endforeach
                    </select>
                </div> --}}

                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
@endsection
