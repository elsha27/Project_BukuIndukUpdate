<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoresiswaRequest;
use App\Http\Requests\UpdatesiswaRequest;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $data['siswa'] = siswa::latest()->paginate(10);
        return view('siswa_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Jika file Excel diunggah
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // Validasi file Excel
            $request->validate([
                'file' => 'required|mimes:xlsx,xls|max:10000', // Hanya file Excel yang diperbolehkan
            ]);

            // Mengimpor data dari file Excel
            try {
                Excel::import(new SiswaImport, $file); // Menggunakan import sesuai dengan class SiswaImport
                flash('Data berhasil diimpor dari file Excel.')->success();
            } catch (\Exception $e) {
                flash('Terjadi kesalahan saat mengimpor data: ' . $e->getMessage())->error();
                return redirect()->back();
            }

            return redirect('/siswa');
        }

        // Jika input manual, lakukan validasi
        $requestData = $request->validate([
            'nama' => 'required|min:3', // Nama minimal 3 karakter
            'nisn' => 'required|unique:siswas,nisn', // No pasien harus unik dan diisi
            'nik' => 'required|unique:siswas,nik', // No pasien harus unik dan diisi
            'tempat_lahir' => 'required', // No pasien harus unik dan diisi
            'tanggal_lahir' => 'required', // No pasien harus unik dan diisi
            'tingkat_rombel' => 'required', // Umur harus berupa angka
            'umur' => 'required', // Umur harus berupa angka
            'status' => 'required | in:Aktif,Tidak Aktif', // Umur harus berupa angka
            'jenis_kelamin' => 'required|in:laki-laki,perempuan', // JK hanya laki-laki/perempuan
            'alamat' => 'nullable', // Alamat boleh kosong
            'no_hp' => 'nullable', // Alamat boleh kosong
            'kebutuhan _khusus' => 'nullable', // Alamat boleh kosong
            'disabilitas' => 'nullable', // Alamat boleh kosong
            'nomor_kip' => 'nullable', // Alamat boleh kosong
            'nama_ayah' => 'required', // Alamat boleh kosong
            'nama_ibu' => 'required', // Alamat boleh kosong
            'nama_wali' => 'required', // Alamat boleh kosong
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:5000', // Foto harus berupa gambar dengan format dan ukuran tertentu

        ]);

        // Membuat objek pasien baru
        $siswa = new siswa();

        // Mengisi data ke dalam model pasien
        $siswa->fill($requestData);

        // Menyimpan foto dan mengisi kolom foto pada model pasien
        $siswa->foto = $request->file('foto')->store('public');

        // Menyimpan data pasien ke database
        $siswa->save();

        // // Mengembalikan response JSON jika diminta
        // if ($request->wantsJson()) {
        //     return response()->json($pasien);
        // }

        // Menampilkan pesan sukses dan mengarahkan kembali ke halaman sebelumnya
        flash('Data berhasil disimpan.')->success();
        return redirect()->route('siswa.index');

        // Excel::import(new SiswaImport, $request->file('file'));
        // return redirect('/siswa');
        // dd($request->file('file'));
    }

    /**
     * Display the specified resource.
     */
    public function show(siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['siswa'] = siswa::findOrFail($id); //seperti mencari buku sesuai id di lemari
        return view('siswa_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required|min:3', // Nama minimal 3 karakter
            'nisn' => 'required|unique:siswas,nisn,' . $id, // No pasien harus unik dan diisi
            'nik' => 'required|unique:siswas,nik,' . $id, // No pasien harus unik dan diisi
            'tempat_lahir' => 'required', // No pasien harus unik dan diisi
            'tanggal_lahir' => 'required', // No pasien harus unik dan diisi
            'tingkat_rombel' => 'required', // Umur harus berupa angka
            'umur' => 'required', // Umur harus berupa angka
            'status' => 'required | in:Aktif,Tidak Aktif', // Umur harus berupa angka
            'jenis_kelamin' => 'required|in:laki-laki,perempuan', // JK hanya laki-laki/perempuan
            'alamat' => 'nullable', // Alamat boleh kosong
            'no_hp' => 'nullable', // Alamat boleh kosong
            'kebutuhan _khusus' => 'nullable', // Alamat boleh kosong
            'disabilitas' => 'nullable', // Alamat boleh kosong
            'nomor_kip' => 'nullable', // Alamat boleh kosong
            'nama_ayah' => 'required', // Alamat boleh kosong
            'nama_ibu' => 'required', // Alamat boleh kosong
            'nama_wali' => 'required', // Alamat boleh kosong
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
            'smt1' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'smt2' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'smt3' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'smt4' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'smt5' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'smt6' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'smt7' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'smt8' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'smt9' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'smt10' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'smt11' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'smt12' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'ijazah' => 'nullable|file|mimes:pdf,doc,docx,jpeg,jpg,png|max:5000',
        ]);
        $siswa = siswa::findOrFail($id); // tidak pakai new karena data sudah ada
        $siswa->fill($requestData);
        //karena di validasi foto boleh null, maka perlu pengecekan apakah ada file foto yang di upload
        //jika ada maka file foto lama di hapus dan diganti dengan file foto baru
        if($request->hasFile('foto')) {  //cek apakah foto ada atau tidak
            Storage::delete($siswa->foto);  //jika ada hapus foto
            $siswa->foto = $request->file('foto')->store('public');
        }elseif($request->hasFile('smt1')){
            Storage::delete($siswa->smt1);  //jika ada hapus foto
            $siswa->foto = $request->file('smt1')->store('public');
        }elseif($request->hasFile('smt2')){
            Storage::delete($siswa->smt2);  //jika ada hapus foto
            $siswa->foto = $request->file('smt2')->store('public');
        }elseif($request->hasFile('smt3')){
            Storage::delete($siswa->smt3);  //jika ada hapus foto
            $siswa->foto = $request->file('smt3')->store('public');
        }elseif($request->hasFile('smt4')){
            Storage::delete($siswa->smt4);  //jika ada hapus foto
            $siswa->foto = $request->file('smt4')->store('public');
        }elseif($request->hasFile('smt5')){
            Storage::delete($siswa->smt5);  //jika ada hapus foto
            $siswa->foto = $request->file('smt5')->store('public');
        }
        $siswa->save(); //menyimpan data ke database
        flash('Data sudah diupdate')->success();
        return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(siswa $siswa)
    {
        //
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new SiswaImport, $request->file('file'));

        return back()->with('success', 'Data siswa berhasil diimport!');
    }
}
