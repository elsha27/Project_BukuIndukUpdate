<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\sk_guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Storesk_guruRequest;
use App\Http\Requests\Updatesk_guruRequest;

class SkGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua data guru
        $guru = Guru::all();

        // Kirim data guru ke view
        return view('sk_create', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $requestData = $request->validate([
            'nik' => 'required|exists:gurus,nik', // Pastikan 'nik' merujuk pada NIK guru
            'tahun' => 'required|numeric|digits:4|regex:/^20\d{2}$/', // Hanya menerima tahun dari 2000-2099
            'jenis_sk' => 'required|in:SK Yayasan,SK Tugas', // Pilihan terbatas
            'semester' => 'required|in:1,2', // Semester hanya 1 atau 2
            'doc_sk' => 'required|file|mimes:pdf,doc,docx|max:5000', // Dokumen opsional
        ]);

        // Cari data guru berdasarkan NIK
        $guru = guru::where('nik', $requestData['nik'])->first();

        // Ambil 6 digit terakhir dari NIK guru
        $lastSixNik = substr($guru->nik, -6);

        // Buat sk_id dengan format {semester}{tahun}{6 digit terakhir NIK}
        $sk_id = $requestData['semester'] . $requestData['tahun'] . $lastSixNik;

        // Cek apakah sk_id sudah ada di database
        if (Sk_Guru::where('sk_id', $sk_id)->exists()) {
            // Jika sk_id sudah ada, tampilkan pesan bahwa data sudah terisi
            flash('Dokumen SK sudah ada.')->error();
            return back(); // Kembalikan ke halaman sebelumnya
        }

        // Buat instance baru sk_guru
        $skguru = new Sk_Guru();
        $skguru->fill($requestData);

        // Tetapkan nilai sk_id
        $skguru->sk_id = $sk_id;

        // Simpan dokumen jika ada
        if ($request->hasFile('doc_sk')) {
            $skguru->doc_sk = $request->file('doc_sk')->store('public');
        }

        // Simpan data ke database
        $skguru->save();

        // Berikan notifikasi sukses
        flash('Data berhasil disimpan.')->success();

        // Redirect ke halaman lain
        return redirect('/guru');
    }

    /**
     * Display the specified resource.
     */
    public function show(sk_guru $sk_guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sk_guru $sk_guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatesk_guruRequest $request, sk_guru $sk_guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari SK berdasarkan ID
        $sk = Sk_Guru::findOrFail($id);

        // Hapus file yang terkait jika ada
        if ($sk->doc_sk) {
            Storage::delete($sk->doc_sk);
        }

        // Hapus data SK
        $sk->delete();

        // Notifikasi atau redirect
        flash('Data SK berhasil dihapus.')->success();
        return redirect('/guru/show');  // Atau sesuaikan dengan rute yang Anda inginkan
    }
}
