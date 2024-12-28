@extends('layouts.app_sneat', ['title' => 'Tambah SK'])
@section('content')
    <div class="card">
        <h5 class="card-header">Tambah Data SK</h5>
        <div class="card-body">
            <form action="/skguru" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group mt-1 mb-3">
                    <label for="nik">Guru</label>
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
                    <label for="tahun">Tahun</label>
                    <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun"
                        name="tahun" value="{{ old('tahun') }}">
                    <span class="text-danger">{{ $errors->first('tahun') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="jenis_sk">Status Kepegawaian</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_sk" id="SK Yayasan" value="SK Yayasan"
                            {{ old('jenis_sk') === 'SK Yayasan' ? 'checked' : '' }}>
                        <label for="SK Yayasan" class="form-check-label">SK Yayasan</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="jenis_sk" id="SK Tugas" value="SK Tugas"
                            {{ old('jenis_sk') === 'SK Tugas' ? 'checked' : '' }}>
                        <label for="SK Tugas" class="form-check-label">SK Tugas</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('jenis_sk') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="semester">Semester</label><br>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="semester" id="1" value="1"
                            {{ old('semester') === '1' ? 'checked' : '' }}>
                        <label for="1" class="form-check-label">semester 1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" name="semester" id="2" value="2"
                            {{ old('semester') === '2' ? 'checked' : '' }}>
                        <label for="2" class="form-check-label">semester 2</label>
                    </div>
                    <span class="text-danger">{{ $errors->first('semester') }}</span>
                </div>
                <div class="form-group mt-1 mb-3">
                    <label for="doc_sk">Dokumen SK (pdf/doc/docx)</label>
                    <input type="file" class="form-control @error('doc_sk') is-invalid @enderror" name="doc_sk">
                    <span class="text-danger">{{ $errors->first('doc_sk') }}</span>
                </div>
                <button type="submit" class="btn btn-primary">SIMPAN</button>
            </form>
        </div>
    </div>
@endsection
