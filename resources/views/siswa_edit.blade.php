@extends('layouts.app', ['title' => 'Edit Data Siswa'])
@section('content')
    <div class="card">
        <h5 class="card-header">Edit Data Siswa : <b>{{ strtoupper($siswa->nama) }}</b></h5>
        <!-- syntax blade yang digunakan untuk menampilkan data dari server ke halaman html dan mengubahnya jadi kapital (strtoupper) -->
        <div class="card-body">
            <form action="/siswa/{{ $siswa->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="foto">Foto Siswa (jpg, jpeg, png)</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                    <img src="{{ Storage::url($siswa->foto) }}" alt="Foto Siswa" class="img-thumbnail mt-2"
                        style="width: 100px">
                    <!--dia akan mengambil foto dari folder storage-->
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama">nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') ?? $siswa->nama }} ">
                    <!--akan mengambil data nama yang lama -->
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                        name="nisn" value="{{ old('nisn') ?? $siswa->nisn }}">
                    <span class="text-danger">{{ $errors->first('nisn') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                        name="nik" value="{{ old('nik') ?? $siswa->nik }}">
                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                        name="tempat_lahir" value="{{ old('tempat_lahir') ?? $siswa->tempat_lahir }}">
                    <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        id="tanggal_lahir" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir') ?? $siswa->tanggal_lahir }}">
                    <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tingkat_rombel">tingkat_rombel</label>
                    <input type="text" class="form-control @error('tingkat_rombel') is-invalid @enderror"
                        id="tingkat_rombel" name="tingkat_rombel"
                        value="{{ old('tingkat_rombel') ?? $siswa->tingkat_rombel }}">
                    <span class="text-danger">{{ $errors->first('tingkat_rombel') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur"
                        name="umur" value="{{ old('umur') ?? $siswa->umur }}">
                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="status">status</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" id="Aktif" value="Aktif"
                            {{ old('status') ?? $siswa->status === 'Aktif' ? 'checked' : '' }}>
                        <!--old() untuk menganmbil data yang ada. pengecekkan (??) jika data tidak ada maka lanjut berikutnya
                                apakah jenis kelamin pasien adalah Laki-laki, jika benar radio button ini akan ditandai checked.-->
                        <label for="Aktif" class="form-check-label">Aktif</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" id="Tidak Aktif" value="Tidak Aktif"
                            {{ old('status') ?? $siswa->status === 'Tidak Aktif' ? 'checked' : '' }}>
                        <!--old() untuk menganmbil data yang ada. pengecekkan (??) jika data tidak ada maka lanjut berikutnya
                                apakah jenis kelamin pasien adalah Laki-laki, jika benar radio button ini akan ditandai checked.-->
                        <label for="Tidak Aktif" class="form-check-label">Tidak Aktif</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="laki_laki" value="laki-laki"
                            {{ old('jenis_kelamin') ?? $siswa->jenis_kelamin === 'Laki-laki' ? 'checked' : '' }}>
                        <!--old() untuk menganmbil data yang ada. pengecekkan (??) jika data tidak ada maka lanjut berikutnya
                                apakah jenis kelamin pasien adalah Laki-laki, jika benar radio button ini akan ditandai checked.-->
                        <label for="laki_laki" class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="perempuan"
                            value="perempuan"
                            {{ old('jenis_kelamin') ?? $siswa->jenis_kelamin === 'Perempuan' ? 'checked' : '' }}>
                        <label for="perempuan" class="form-check-label">Perempuan</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" value="{{ old('alamat') ?? $siswa->alamat }}">
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="no_hp">no_hp</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                        name="no_hp" value="{{ old('no_hp') ?? $siswa->no_hp }}">
                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="kebutuhan _khusus">kebutuhan _khusus</label>
                    <input type="text" class="form-control @error('kebutuhan _khusus') is-invalid @enderror"
                        id="kebutuhan _khusus" name="kebutuhan _khusus"
                        value="{{ old('kebutuhan _khusus') ?? $siswa->kebutuhan_khusus }}">
                    <span class="text-danger">{{ $errors->first('kebutuhan _khusus') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="disabilitas">disabilitas</label>
                    <input type="text" class="form-control @error('disabilitas') is-invalid @enderror"
                        id="disabilitas" name="disabilitas" value="{{ old('disabilitas') ?? $siswa->disabilitas }}">
                    <span class="text-danger">{{ $errors->first('disabilitas') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nomor_kip">nomor_kip</label>
                    <input type="text" class="form-control @error('nomor_kip') is-invalid @enderror" id="nomor_kip"
                        name="nomor_kip" value="{{ old('nomor_kip') ?? $siswa->nomor_kip }}">
                    <span class="text-danger">{{ $errors->first('nomor_kip') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_ayah">nama_ayah</label>
                    <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah"
                        name="nama_ayah" value="{{ old('nama_ayah') ?? $siswa->nama_ayah }}">
                    <span class="text-danger">{{ $errors->first('nama_ayah') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_ibu">nama_ibu</label>
                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu"
                        name="nama_ibu" value="{{ old('nama_ibu') ?? $siswa->nama_ibu }}">
                    <span class="text-danger">{{ $errors->first('nama_ibu') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_wali">nama_wali</label>
                    <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" id="nama_wali"
                        name="nama_wali" value="{{ old('nama_wali') ?? $siswa->nama_wali }}">
                    <span class="text-danger">{{ $errors->first('nama_wali') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="smt1">Rapor Kelas 1, Semester 1 (pdf/doc/docx)</label>
                    <input type="file" class="form-control @error('smt1') is-invalid @enderror" name="smt1"
                    value="{{ old('smt1') ?? $siswa->smt1 }}">
                    <span class="text-danger">{{ $errors->first('smt1') }}</span>
                </div>
                
                @if ($siswa->smt1 || old('smt1'))  <!-- Menambahkan pengecekan apakah smt1 sudah ada -->
                    <div class="form-group mt-1 mb-3">
                        <label for="smt2">Rapor Kelas 1, Semester 2 (pdf/doc/docx)</label>
                        <input type="file" class="form-control @error('smt2') is-invalid @enderror" name="smt2"
                        value="{{ old('smt2') ?? $siswa->smt2 }}">
                        <span class="text-danger">{{ $errors->first('smt2') }}</span>
                    </div>
                @endif
                
                @if ($siswa->smt2 || old('smt2'))  <!-- Menambahkan pengecekan apakah smt2 sudah ada -->
                    <div class="form-group mt-1 mb-3">
                        <label for="smt3">Rapor Kelas 1, Semester 3 (pdf/doc/docx)</label>
                        <input type="file" class="form-control @error('smt3') is-invalid @enderror" name="smt3">
                        <span class="text-danger">{{ $errors->first('smt3') }}</span>
                    </div>
                @endif
                
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
@endsection
