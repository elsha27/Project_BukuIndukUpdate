@extends('layouts.app_sneat_user', ['title' => 'Edit Data Siswa'])
@section('content')
    <div class="card">
        <h5 class="card-header">Edit Data Siswa : <b>{{ strtoupper($siswa->nama) }}</b></h5>
        <!-- syntax blade yang digunakan untuk menampilkan data dari server ke halaman html dan mengubahnya jadi kapital (strtoupper) -->
        <div class="card-body">
            <form action="/user/siswa/{{ $siswa->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="foto">Foto Siswa (jpg, jpeg, png)</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                    
                    <!--dia akan mengambil foto dari folder storage-->
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama">nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                        name="nama" value="{{ old('nama') ?? $siswa->nama }} " readonly>
                    <!--akan mengambil data nama yang lama -->
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn"
                        name="nisn" value="{{ old('nisn') ?? $siswa->nisn }}" readonly>
                    <span class="text-danger">{{ $errors->first('nisn') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nik">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                        name="nik" value="{{ old('nik') ?? $siswa->nik }}"readonly>
                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                        name="tempat_lahir" value="{{ old('tempat_lahir') ?? $siswa->tempat_lahir }}" readonly>
                    <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        id="tanggal_lahir" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir') ?? $siswa->tanggal_lahir }}" readonly>
                    <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tingkat_rombel">tingkat_rombel</label>
                    <input type="text" class="form-control @error('tingkat_rombel') is-invalid @enderror"
                        id="tingkat_rombel" name="tingkat_rombel"
                        value="{{ old('tingkat_rombel') ?? $siswa->tingkat_rombel }}" readonly>
                    <span class="text-danger">{{ $errors->first('tingkat_rombel') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur"
                        name="umur" value="{{ old('umur') ?? $siswa->umur }}" readonly>
                    <span class="text-danger">{{ $errors->first('umur') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="status">status</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" id="Aktif" value="Aktif"
                            {{ (old('status') ?? $siswa->status) === 'Aktif' ? 'checked' : '' }} disabled>
                        <label for="Aktif" class="form-check-label">Aktif</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" id="Tidak Aktif" value="Tidak Aktif"
                            {{ (old('status') ?? $siswa->status) === 'Tidak Aktif' ? 'checked' : '' }} disabled>
                        <label for="Tidak Aktif" class="form-check-label">Tidak Aktif</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" id="Lulus" value="Lulus"
                            {{ (old('status') ?? $siswa->status) === 'Lulus' ? 'checked' : '' }} disabled>
                        <label for="Lulus" class="form-check-label">Lulus</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status" id="Pindah" value="Pindah"
                            {{ (old('status') ?? $siswa->status) === 'Pindah' ? 'checked' : '' }} disabled>
                        <label for="Pindah" class="form-check-label">Pindah</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                </div>                
                <<div class="form-group mt-1 mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="Laki_laki" value="Laki-laki"
                            {{ (old('jenis_kelamin') ?? $siswa->jenis_kelamin) === 'Laki-laki' ? 'checked' : '' }} disabled>
                        <label for="Laki_laki" class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="Perempuan"
                            value="Perempuan"
                            {{ (old('jenis_kelamin') ?? $siswa->jenis_kelamin) === 'Perempuan' ? 'checked' : '' }} disabled>
                        <label for="Perempuan" class="form-check-label">Perempuan</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                </div>                
                <div class="form-group mt-1 mb-3">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                        name="alamat" value="{{ old('alamat') ?? $siswa->alamat }}" readonly>
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="no_hp">no_hp</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                        name="no_hp" value="{{ old('no_hp') ?? $siswa->no_hp }}" readonly>
                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="kebutuhan _khusus">kebutuhan _khusus</label>
                    <input type="text" class="form-control @error('kebutuhan _khusus') is-invalid @enderror"
                        id="kebutuhan _khusus" name="kebutuhan _khusus"
                        value="{{ old('kebutuhan _khusus') ?? $siswa->kebutuhan_khusus }}" readonly>
                    <span class="text-danger">{{ $errors->first('kebutuhan _khusus') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="disabilitas">disabilitas</label>
                    <input type="text" class="form-control @error('disabilitas') is-invalid @enderror"
                        id="disabilitas" name="disabilitas" value="{{ old('disabilitas') ?? $siswa->disabilitas }}" readonly>
                    <span class="text-danger">{{ $errors->first('disabilitas') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nomor_kip">nomor_kip</label>
                    <input type="text" class="form-control @error('nomor_kip') is-invalid @enderror" id="nomor_kip"
                        name="nomor_kip" value="{{ old('nomor_kip') ?? $siswa->nomor_kip }}" readonly>
                    <span class="text-danger">{{ $errors->first('nomor_kip') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_ayah">nama_ayah</label>
                    <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah"
                        name="nama_ayah" value="{{ old('nama_ayah') ?? $siswa->nama_ayah }}" readonly>
                    <span class="text-danger">{{ $errors->first('nama_ayah') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_ibu">nama_ibu</label>
                    <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu"
                        name="nama_ibu" value="{{ old('nama_ibu') ?? $siswa->nama_ibu }}" readonly>
                    <span class="text-danger">{{ $errors->first('nama_ibu') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_wali">nama_wali</label>
                    <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" id="nama_wali"
                        name="nama_wali" value="{{ old('nama_wali') ?? $siswa->nama_wali }}" readonly>
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
                        <label for="smt3">Rapor Kelas 2, Semester 1 (pdf/doc/docx)</label>
                        <input type="file" class="form-control @error('smt3') is-invalid @enderror" name="smt3">
                        <span class="text-danger">{{ $errors->first('smt3') }}</span>
                    </div>
                @endif

                @if ($siswa->smt3 || old('smt3'))  <!-- Menambahkan pengecekan apakah smt2 sudah ada -->
                    <div class="form-group mt-1 mb-3">
                        <label for="smt4">Rapor Kelas 2, Semester 2 (pdf/doc/docx)</label>
                        <input type="file" class="form-control @error('smt4') is-invalid @enderror" name="smt4">
                        <span class="text-danger">{{ $errors->first('smt4') }}</span>
                    </div>
                @endif

                @if ($siswa->smt4 || old('smt4'))  <!-- Menambahkan pengecekan apakah smt2 sudah ada -->
                    <div class="form-group mt-1 mb-3">
                        <label for="smt5">Rapor Kelas 3, Semester 1 (pdf/doc/docx)</label>
                        <input type="file" class="form-control @error('smt5') is-invalid @enderror" name="smt5">
                        <span class="text-danger">{{ $errors->first('smt5') }}</span>
                    </div>
                @endif
                @if ($siswa->smt5 || old('smt5'))  <!-- Menambahkan pengecekan apakah smt2 sudah ada -->
                    <div class="form-group mt-1 mb-3">
                        <label for="smt6">Rapor Kelas 3, Semester 2 (pdf/doc/docx)</label>
                        <input type="file" class="form-control @error('smt6') is-invalid @enderror" name="smt6">
                        <span class="text-danger">{{ $errors->first('smt6') }}</span>
                    </div>
                @endif
                @if ($siswa->smt6 || old('smt6'))  <!-- Menambahkan pengecekan apakah smt2 sudah ada -->
                    <div class="form-group mt-1 mb-3">
                        <label for="smt7">Rapor Kelas 4, Semester 1 (pdf/doc/docx)</label>
                        <input type="file" class="form-control @error('smt7') is-invalid @enderror" name="smt7">
                        <span class="text-danger">{{ $errors->first('smt7') }}</span>
                    </div>
                @endif
                @if ($siswa->smt7 || old('smt7'))  <!-- Menambahkan pengecekan apakah smt2 sudah ada -->
                    <div class="form-group mt-1 mb-3">
                        <label for="smt8">Rapor Kelas 4, Semester 2 (pdf/doc/docx)</label>
                        <input type="file" class="form-control @error('smt8') is-invalid @enderror" name="smt8">
                        <span class="text-danger">{{ $errors->first('smt8') }}</span>
                    </div>
                @endif
                @if ($siswa->smt8 || old('smt8'))  <!-- Menambahkan pengecekan apakah smt2 sudah ada -->
                    <div class="form-group mt-1 mb-3">
                        <label for="smt9">Rapor Kelas 5, Semester 1 (pdf/doc/docx)</label>
                        <input type="file" class="form-control @error('smt9') is-invalid @enderror" name="smt9">
                        <span class="text-danger">{{ $errors->first('smt9') }}</span>
                    </div>
                @endif
                @if ($siswa->smt9 || old('smt9'))  <!-- Menambahkan pengecekan apakah smt2 sudah ada -->
                    <div class="form-group mt-1 mb-3">
                        <label for="smt10">Rapor Kelas 5, Semester 2 (pdf/doc/docx)</label>
                        <input type="file" class="form-control @error('smt10') is-invalid @enderror" name="smt10">
                        <span class="text-danger">{{ $errors->first('smt10') }}</span>
                    </div>
                @endif
                @if ($siswa->smt10 || old('smt10'))  <!-- Menambahkan pengecekan apakah smt2 sudah ada -->
                    <div class="form-group mt-1 mb-3">
                        <label for="smt11">Rapor Kelas 6, Semester 1 (pdf/doc/docx)</label>
                        <input type="file" class="form-control @error('smt11') is-invalid @enderror" name="smt11">
                        <span class="text-danger">{{ $errors->first('smt11') }}</span>
                    </div>
                @endif
                @if ($siswa->smt11 || old('smt11'))  <!-- Menambahkan pengecekan apakah smt2 sudah ada -->
                    <div class="form-group mt-1 mb-3">
                        <label for="smt12">Rapor Kelas 6, Semester 2 (pdf/doc/docx)</label>
                        <input type="file" class="form-control @error('smt12') is-invalid @enderror" name="smt12">
                        <span class="text-danger">{{ $errors->first('smt12') }}</span>
                    </div>
                @endif
                @if ($siswa->smt12 || old('smt12'))  <!-- Menambahkan pengecekan apakah smt2 sudah ada -->
                    <div class="form-group mt-1 mb-3">
                        <label for="ijazah">Ijazah (pdf/doc/docx)</label>
                        <input type="file" class="form-control @error('ijazah') is-invalid @enderror" name="ijazah">
                        <span class="text-danger">{{ $errors->first('ijazah') }}</span>
                    </div>
                @endif
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
@endsection
