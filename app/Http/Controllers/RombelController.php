<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\siswa;
use App\Models\rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorerombelRequest;
use App\Http\Requests\UpdaterombelRequest;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data rombel dengan relasi guru
    $rombel = Rombel::with('guru')->get();
    if (Auth::check()) {
        if (Auth::user()->role == 'user') {
            return view('user.rombel_index', compact('rombel'));
        } elseif (Auth::user()->role == 'admin') {
            return view('admin.rombel_index', compact('rombel'));
        }
    }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // Ambil data rombel dan siswa berdasarkan ID
         $guru = guru::all(); // Ambil semua data rombel
 
         // Kirimkan data ke view
         return view('admin.rombel_create', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'rombel_id' => 'required|unique:rombels,rombel_id', // Nama minimal 3 karakter
            'nama_rombel' => 'required|min:3', // Nama minimal 3 karakter
            'tingkat' => 'required|numeric|between:1,6',
            'nik' => 'required|exists:gurus,nik',
            'nama_ruangan' => 'required|min:3', // No pasien harus unik dan diisi
            'semester' => 'required | in:Ganjil,Genap', // Umur harus berupa angka
            'tahun_ajaran' => 'required|regex:/^\d{4}\/\d{4}$/',
        ]);
        $rombel = new rombel();
        $rombel->fill($requestData);
        $rombel->save();
        flash('Data berhasil disimpan.')->success();
        return redirect()->route('rombel.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rombel = rombel::findOrFail($id);
        if (Auth::check()) {
            if (Auth::user()->role == 'user') {
                return view('user.rombel_show', ['rombel' => $rombel]);
            } elseif (Auth::user()->role == 'admin') {
                return view('admin.rombel_show', ['rombel' => $rombel]);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Ambil data rombel dan siswa berdasarkan ID
        $guru = guru::all(); // Ambil semua data rombel
        $rombel = Rombel::findOrFail($id);
        // Kirimkan data ke view
        return view('admin.rombel_edit', compact('rombel','guru'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'rombel_id' => 'required|unique:rombels,rombel_id,' . $id . ',id',
            'nama_rombel' => 'required|min:3', 
            'tingkat' => 'required|numeric|between:1,6',
            'nik' => 'required|exists:gurus,nik',
            'nama_ruangan' => 'required|min:3', 
            'semester' => 'required | in:Ganjil,Genap', 
            'tahun_ajaran' => 'required|regex:/^\d{4}\/\d{4}$/',
            'nisn' => 'nullable|array',
        ]);
        $rombel = rombel::findOrFail($id); 
        $rombel->fill($requestData);
        $rombel->save(); //menyimpan data ke database
        flash('Data sudah diupdate')->success();
        return redirect('/admin/rombel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rombel = rombel::findOrFail($id);
        if ($rombel->siswa()->exists()) {
            flash('Data tidak bisa dihapus karena sudah ada siswa')->error();
            return back();
        }

        $rombel->delete();
        flash('Data sudah dihapus')->success();
        return back();
    }
}
