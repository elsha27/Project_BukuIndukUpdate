@extends('layouts.app_sneat_admin', ['title' => 'Tambah Siswa'])
@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Data Siswa</h5>
        <div class="card-body">
            <form action="/admin/siswa" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="foto">Foto Siswa (jpg, jpeg, png)</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama">Nama Siswa</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') }}">
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                        name="nik" value="{{ old('nik') }}">
                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                        name="nisn" value="{{ old('nisn') }}">
                    <span class="text-danger">{{ $errors->first('nisn') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                        name="tempat_lahir" value="{{ old('tempat_lahir') }}">
                    <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
                        name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                    <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="rombel_id">Nama Rombel
                        <a href="/rombel/create" target="blank">Buat Rombel Baru</a>
                    </label>
                    <select name="rombel_id" class="form-control select2" data-placeholder="Cari Rombel....">
                        <option value="">-- Pilih Rombel --</option>
                        @foreach ($rombels as $item)
                            <option value="{{ $item->id }}" @selected(old('rombel_id') == $item->id)>
                                {{ $item->rombel_id }} - {{ $item->nama_rombel }}
                            </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('rombel_id') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="umur">umur</label>
                    <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur"
                        name="umur" value="{{ old('umur') }}">
                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="status">status</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" id="Aktif" value="Aktif"
                            {{ old('status') === 'Aktif' ? 'checked' : '' }}>
                        <label for="Aktif" class="form-check-label">Aktif</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" id="Nonaktif" value="Nonaktif"
                            {{ old('status') === 'Nonaktif' ? 'checked' : '' }}>
                        <label for="Nonaktif" class="form-check-label">Nonaktif</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" id="Lulus" value="Lulus"
                            {{ old('status') === 'Lulus' ? 'checked' : '' }}>
                        <label for="Lulus" class="form-check-label">Lulus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" id="Pindah" value="Pindah"
                            {{ old('status') === 'Pindah' ? 'checked' : '' }}>
                        <label for="Pindah" class="form-check-label">Pindah</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="Laki_laki" value="Laki-laki"
                            {{ old('jenis_kelamin') === 'Laki-laki' ? 'checked' : '' }}>
                        <label for="Laki_laki" class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="Perempuan" value="Perempuan"
                            {{ old('jenis_kelamin') === 'Perempuan' ? 'checked' : '' }}>
                        <label for="Perempuan" class="form-check-label">Perempuan</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="alamat">alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" value="{{ old('alamat') }}">
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="no_hp">no_hp</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                        name="no_hp" value="{{ old('no_hp') }}">
                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="kebutuhan_khusus">kebutuhan_khusus</label>
                    <input type="text" class="form-control @error('kebutuhan_khusus') is-invalid @enderror" id="kebutuha _khusus"
                        name="kebutuhan_khusus" value="{{ old('kebutuhan_khusus') }}">
                    <span class="text-danger">{{ $errors->first('kebutuhan_khusus') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="disabilitas">disabilitas</label>
                    <input type="text" class="form-control @error('disabilitas') is-invalid @enderror" id="disabilitas"
                        name="disabilitas" value="{{ old('disabilitas') }}">
                    <span class="text-danger">{{ $errors->first('disabilitas') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nomor_kip">nomor_kip</label>
                    <input type="text" class="form-control @error('nomor_kip') is-invalid @enderror" id="nomor_kip"
                        name="nomor_kip" value="{{ old('nomor_kip') }}">
                    <span class="text-danger">{{ $errors->first('nomor_kip') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_ayah">nama_ayah</label>
                    <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah"
                        name="nama_ayah" value="{{ old('nama_ayah') }}">
                    <span class="text-danger">{{ $errors->first('nama_ayah') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_ibu">nama_ibu</label>
                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu"
                        name="nama_ibu" value="{{ old('nama_ibu') }}">
                    <span class="text-danger">{{ $errors->first('nama_ibu') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_wali">nama_wali</label>
                    <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" id="nama_wali"
                        name="nama_wali" value="{{ old('nama_wali') }}">
                    <span class="text-danger">{{ $errors->first('nama_wali') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
