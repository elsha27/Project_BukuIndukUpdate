@extends('layouts.app', ['title' => 'Tambah Rombel'])
@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Data Rombel</h5>
        <div class="card-body">
            <form action="/rombel" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="nama_rombel">Nama Rombel</label>
                    <input type="text" class="form-control @error('nama_rombel') is-invalid @enderror" id="nama_rombel"
                        name="nama_rombel" value="{{ old('nama_rombel') }}">
                    <span class="text-danger">{{ $errors->first('nama_rombel') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tingkat">Tingkat</label>
                    <input type="number" class="form-control @error('tingkat') is-invalid @enderror" id="tingkat"
                        name="tingkat" value="{{ old('tingkat') }}">
                    <span class="text-danger">{{ $errors->first('tingkat') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="wali_kelas">Wali Kelas</label>
                    <input type="text" class="form-control @error('wali_kelas') is-invalid @enderror" id="wali_kelas"
                        name="wali_kelas" value="{{ old('wali_kelas') }}">
                    <span class="text-danger">{{ $errors->first('wali_kelas') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_ruangan">Nama Ruangan</label>
                    <input type="text" class="form-control @error('nama_ruangan') is-invalid @enderror" id="nama_ruangan"
                        name="nama_ruangan" value="{{ old('nama_ruangan') }}">
                    <span class="text-danger">{{ $errors->first('nama_ruangan') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="semester">Semester</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="semester" id="Ganjil" value="Ganjil"
                            {{ old('semester') === 'Ganjil' ? 'checked' : '' }}>
                        <label for="Ganjil" class="form-check-label">Ganjil</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="semester" id="Genap" value="Genap"
                            {{ old('semester') === 'Genap' ? 'checked' : '' }}>
                        <label for="Genap" class="form-check-label">Genap</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('semester') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tahun_ajaran">Tahun Ajaran</label>
                    <input type="text" class="form-control @error('tahun_ajaran') is-invalid @enderror" id="tahun_ajaran"
                        name="tahun_ajaran" value="{{ old('tahun_ajaran') }}">
                    <span class="text-danger">{{ $errors->first('tahun_ajaran') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
