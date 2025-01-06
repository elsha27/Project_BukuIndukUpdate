@extends('layouts.app_sneat_admin', ['title' => 'Edit Data Guru'])
@section('content')
    <div class="card">
        <h5 class="card-header">Edit Data Guru : <b>{{ strtoupper($guru->nama_guru) }}</b></h5>
        <!-- syntax blade yang digunakan untuk menampilkan data dari server ke halaman html dan mengubahnya jadi kapital (strtoupper) -->
        <div class="card-body">
            <form action="/admin/guru/{{ $guru->id }}" method="post" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="foto">Foto Guru (jpg, jpeg, png)</label>
                    <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                    <img src="{{ Storage::url($guru->foto) }}" alt="Foto Guru" class="img-thumbnail mt-2"
                        style="width: 100px">
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nik">NIK</label>
                    <input type="number" class="form-control @error('nik') is-invalid @enderror" id="nik"
                        name="nik" value="{{ old('nik') ?? $guru->nik }}">
                    <span class="text-danger">{{ $errors->first('nik') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nama_guru">Nama Guru</label>
                    <input type="text" class="form-control @error('nama_guru') is-invalid @enderror" id="nama_guru"
                        name="nama_guru" value="{{ old('nama_guru') ?? $guru->nama_guru }}">
                    <span class="text-danger">{{ $errors->first('nama_guru') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nuptk">NUPTK</label>
                    <input type="number" class="form-control @error('nuptk') is-invalid @enderror" id="nuptk"
                        name="nuptk" value="{{ old('nuptk') ?? $guru->nuptk }}">
                    <span class="text-danger">{{ $errors->first('nuptk') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="status_kepegawaian">Status Kepegawaian</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status_kepegawaian" id="PNS"
                            value="PNS"
                            {{ old('status_kepegawaian') ?? $guru->status_kepegawaian === 'PNS' ? 'checked' : '' }}>
                        <label for="PNS" class="form-check-label">PNS</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="status_kepegawaian" id="Non PNS"
                            value="Non PNS"
                            {{ old('status_kepegawaian') ?? $guru->status_kepegawaian === 'Non PNS' ? 'checked' : '' }}>
                        <label for="Non PNS" class="form-check-label">Non PNS</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('status_kepegawaian') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="nip">NIP</label>
                    <input type="number" class="form-control @error('nip') is-invalid @enderror" id="nip"
                        name="nip" value="{{ old('nip') }}">
                    <span class="text-danger">{{ $errors->first('nip') ?? $guru->nip }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="jenis_kelamin">Jenis Kelamin</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="Laki_laki" value="Laki-laki"
                            {{ old('jenis_kelamin') ?? $guru->jenis_kelamin === 'Laki-laki' ? 'checked' : '' }}>
                        <label for="Laki_laki" class="form-check-label">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_kelamin" id="Perempuan" value="Perempuan"
                            {{ old('jenis_kelamin') ?? $guru->jenis_kelamin === 'Perempuan' ? 'checked' : '' }}>
                        <label for="Perempuan" class="form-check-label">Perempuan</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
                        name="tempat_lahir" value="{{ old('tempat_lahir') ?? $guru->tempat_lahir }}">
                    <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        id="tanggal_lahir" name="tanggal_lahir"
                        value="{{ old('tanggal_lahir') ?? $guru->tanggal_lahir }}">
                    <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="no_hp">no_hp</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                        name="no_hp" value="{{ old('no_hp') ?? $guru->no_hp }}">
                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') ?? $guru->email }}">
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="mapel">Mata Pelajaran</label>
                    <input type="text" class="form-control @error('mapel') is-invalid @enderror" id="mapel"
                        name="mapel" value="{{ old('mapel') ?? $guru->mapel }}">
                    <span class="text-danger">{{ $errors->first('mapel') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="total_jtm">Total JTM</label>
                    <input type="number" class="form-control @error('total_jtm') is-invalid @enderror" id="total_jtm"
                        name="total_jtm" value="{{ old('total_jtm') ?? $guru->total_jtm }}">
                    <span class="text-danger">{{ $errors->first('total_jtm') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="ijazah_sd">Ijazah SD (pdf/doc/docx)</label>
                    <input type="file" class="form-control @error('ijazah_sd') is-invalid @enderror"
                        name="ijazah_sd">
                    <span class="text-danger">{{ $errors->first('ijazah_sd') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="ijazah_smp">Ijazah SMP (pdf/doc/docx)</label>
                    <input type="file" class="form-control @error('ijazah_smp') is-invalid @enderror"
                        name="ijazah_smp">
                    <span class="text-danger">{{ $errors->first('ijazah_smp') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="ijazah_sma">Ijazah SMA (pdf/doc/docx)</label>
                    <input type="file" class="form-control @error('ijazah_sma') is-invalid @enderror"
                        name="ijazah_sma">
                    <span class="text-danger">{{ $errors->first('ijazah_sma') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="ijazah_s1">Ijazah S1 (pdf/doc/docx)</label>
                    <input type="file" class="form-control @error('ijazah_s1') is-invalid @enderror"
                        name="ijazah_sm1">
                    <span class="text-danger">{{ $errors->first('ijazah_s1') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="ijazah_s2">Ijazah S2 (pdf/doc/docx)</label>
                    <input type="file" class="form-control @error('ijazah_s2') is-invalid @enderror"
                        name="ijazah_s2">
                    <span class="text-danger">{{ $errors->first('ijazah_s2') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="kartukeluarga">Kartu Keluarga (pdf/doc/docx)</label>
                    <input type="file" class="form-control @error('kartukeluarga') is-invalid @enderror"
                        name="kartukeluarga">
                    <span class="text-danger">{{ $errors->first('kartukeluarga') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="ktp">KTP (pdf/doc/docx)</label>
                    <input type="file" class="form-control @error('ktp') is-invalid @enderror" name="ktp">
                    <span class="text-danger">{{ $errors->first('ktp') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
        </div>
    </div>
@endsection
