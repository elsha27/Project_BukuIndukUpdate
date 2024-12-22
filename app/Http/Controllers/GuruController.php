<?php

namespace App\Http\Controllers;

use App\Models\guru;
use Illuminate\Http\Request;
use App\Http\Requests\StoreguruRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateguruRequest;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['guru'] = guru::latest()->paginate(10);
        return view('guru_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nik' => 'required|unique:gurus,nik|digits:16', 
            'nama_guru' => 'required|min:3', 
            'nuptk' => 'nullable|numeric',
            'status_kepegawaian' => 'required | in:PNS,Non PNS',
            'nip' => 'nullable|numeric',
            'jenis_kelamin' => 'required | in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required', 
            'tanggal_lahir' => 'required', 
            'no_hp' => 'required|numeric', 
            'email' => 'required|email', 
            'mapel' => 'required', 
            'total_jtm' => 'required|numeric', 
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
            'ijazah_sd' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'ijazah_smp' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'ijazah_sma' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'ijazah_s1' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'ijazah_s2' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'sk_yayasan' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'sk_tugas' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'kartukeluarga' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'ktp' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
        ]);
        $guru = new guru();
        $guru->fill($requestData);
        $fields = ['foto','ijazah_sd','ijazah_smp','ijazah_sma','ijazah_s1','ijazah_s2','sk_yayasan','sk_tugas','kartukeluarga','ktp'];
        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                // Simpan file baru
                $guru->$field = $request->file($field)->store('public');
            }
        }
        $guru->save();
        flash('Data berhasil disimpan.')->success();
        return redirect()->route('guru.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['guru'] = guru::findOrFail($id); //seperti mencari buku sesuai id di lemari
        return view('guru_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'nik' => 'required|digits:16|unique:gurus,nik,' . $id,
            'nama_guru' => 'required|min:3', 
            'nuptk' => 'nullable|numeric',
            'status_kepegawaian' => 'required | in:PNS,Non PNS',
            'nip' => 'nullable|numeric',
            'jenis_kelamin' => 'required | in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required', 
            'tanggal_lahir' => 'required', 
            'no_hp' => 'required|numeric', 
            'email' => 'required|email', 
            'mapel' => 'required', 
            'total_jtm' => 'required|numeric', 
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:5000',
            'ijazah_sd' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'ijazah_smp' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'ijazah_sma' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'ijazah_s1' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'ijazah_s2' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'kartukeluarga' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
            'ktp' => 'nullable|file|mimes:pdf,doc,docx|max:5000',
        ]);
        $guru = guru::findOrFail($id); 
        $guru->fill($requestData);
        $fields = ['foto','ijazah_sd','ijazah_smp','ijazah_sma','ijazah_s1','ijazah_s2','sk_yayasan','sk_tugas','kartukeluarga','ktp'];

        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                // Hapus file lama jika ada
                if ($guru->$field) {
                    Storage::delete($guru->$field);
                }
                // Simpan file baru
                $guru->$field = $request->file($field)->store('public');
            }
        }
        $guru->save(); //menyimpan data ke database
        flash('Data sudah diupdate')->success();
        return redirect('/guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(guru $guru)
    {
        //
    }
}
