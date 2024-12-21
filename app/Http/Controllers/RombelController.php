<?php

namespace App\Http\Controllers;

use App\Models\rombel;
use Illuminate\Http\Request;
use App\Http\Requests\StorerombelRequest;
use App\Http\Requests\UpdaterombelRequest;

class RombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['rombel'] = rombel::latest()->paginate(10);
        return view('rombel_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rombel_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $requestData = $request->validate([
            'nama_rombel' => 'required|min:3', // Nama minimal 3 karakter
            'tingkat' => 'required|numeric|between:1,6',
            'wali_kelas' => 'required',
            'nama_ruangan' => 'required|min:3', // No pasien harus unik dan diisi
            'semester' => 'required | in:Ganjil,Genap', // Umur harus berupa angka
            'tahun_ajaran' => 'required|regex:/^\d{4}\/\d{4}$/',
        ]);
        $rombel = new rombel();
        $rombel->fill($requestData);
        $rombel->rombel_id = 'Kelas ' . $request->tingkat . ' - ' . $request->nama_rombel;
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
        return view('rombel_show', ['rombel' => $rombel]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rombel $rombel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdaterombelRequest $request, rombel $rombel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rombel $rombel)
    {
        //
    }
}
