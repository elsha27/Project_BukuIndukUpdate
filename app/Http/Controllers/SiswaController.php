<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\rombel;
use App\Imports\SiswaImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoresiswaRequest;
use App\Http\Requests\UpdatesiswaRequest;
use App\Http\Controllers\RombelController;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        // // Ambil query pencarian dari input
        // $search = $request->input('search');

        // // Query untuk mencari siswa berdasarkan nama, NISN, atau kelas
        // $data['siswa'] = Siswa::when($search, function ($query, $search) {
        //     $query->where('nama', 'like', "%{$search}%")
        //         ->orWhere('nisn', 'like', "%{$search}%")
        //         ->orWhereHas('rombel', function ($query) use ($search) {
        //             $query->where('nama', 'like', "%{$search}%"); // Asumsikan kelas ada di relasi 'rombel'
        //         });
        // })->latest()->paginate(10);

        // // Pastikan search tetap ada di query pagination
        // $data['siswa']->appends(['search' => $search]);

        $data['siswa'] = siswa::latest()->paginate(10);
        if (Auth::check()) {
            if (Auth::user()->role == 'user') {
                return view('user.siswa_index', $data);
            } elseif (Auth::user()->role == 'admin') {
                return view('admin.siswa_index', $data);
            }
        }
        return redirect('/login'); // Pengguna tidak terautentikasi, arahkan ke halaman login
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rombels = Rombel::all(); // Ambil semua data rombel

        if (Auth::check()) {
            if (Auth::user()->role == 'user') {
                return view('user.siswa_create', compact('rombels'));
            } elseif (Auth::user()->role == 'admin') {
                return view('admin.siswa_create', compact('rombels'));
            }
        }

        return redirect('/login'); // Pengguna tidak terautentikasi, arahkan ke halaman login
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
            return redirect('/admin/siswa');
        }

        // Jika input manual, lakukan validasi
        $requestData = $request->validate([
            'nama' => 'required|min:3',
            'nisn' => 'required|unique:siswas,nisn',
            'nik' => 'required|unique:siswas,nik',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'rombel_id' => 'required|exists:rombels,id',
            'umur' => 'required',
            'status' => 'required | in:Aktif,Nonaktif,Lulus,Pindah',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'kebutuhan_khusus' => 'nullable',
            'disabilitas' => 'nullable',
            'nomor_kip' => 'nullable',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nama_wali' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:5000',

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
        if (Auth::check()) {
            if (Auth::user()->role == 'user') {
                return redirect()->route('user.siswa_index');
            } elseif (Auth::user()->role == 'admin') {
                return redirect('/admin/siswa');
            }
        }
        return redirect('/login'); // Pengguna tidak terautentikasi, arahkan ke halaman login
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswa = siswa::findOrFail($id);
        if (Auth::check()) {
            if (Auth::user()->role == 'user') {
                return view('user.siswa_show', ['siswa' => $siswa]);
            } elseif (Auth::user()->role == 'admin') {
                return view('admin.siswa_show', ['siswa' => $siswa]);
            }
        }
        return redirect('/login'); // Pengguna tidak terautentikasi, arahkan ke halaman login
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data rombel dan siswa berdasarkan ID
        $rombels = Rombel::all(); // Ambil semua data rombel
        $siswa = Siswa::findOrFail($id); // Cari siswa berdasarkan ID

        if (Auth::check()) {
            if (Auth::user()->role == 'user') {
                return view('user.siswa_edit', compact('rombels', 'siswa'));
            } elseif (Auth::user()->role == 'admin') {
                return view('admin.siswa_edit', compact('rombels', 'siswa'));
            }
        }
        return redirect('/login'); // Pengguna tidak terautentikasi, arahkan ke halaman login
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required|min:3',
            'nisn' => 'required|unique:siswas,nisn,' . $id,
            'nik' => 'required|unique:siswas,nik,' . $id,
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'status' => 'nullable | in:Aktif,Nonaktif,Lulus,Pindah',
            'jenis_kelamin' => 'nullable|in:Laki-laki,Perempuan',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'kebutuhan _khusus' => 'nullable',
            'disabilitas' => 'nullable',
            'nomor_kip' => 'nullable',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'nama_wali' => 'required',
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
            'rombel_id' => 'nullable|exists:rombels,id',
        ]);
        $siswa = siswa::findOrFail($id);
        $siswa->fill($requestData);

        $fields = ['foto', 'smt1', 'smt2', 'smt3', 'smt4', 'smt5', 'smt6', 'smt7', 'smt8', 'smt9', 'smt10', 'smt11', 'smt12', 'ijazah'];

        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                // Hapus file lama jika ada
                if ($siswa->$field) {
                    Storage::delete($siswa->$field);
                }
                // Simpan file baru
                $siswa->$field = $request->file($field)->store('public');
            }
        }

        $siswa->save(); //menyimpan data ke database
        flash('Data sudah diupdate')->success();
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        // Periksa apakah siswa terkait dengan rombel
        if ($siswa->rombel()->exists()) {
            flash('Siswa tidak bisa dihapus karena sudah masuk dalam data rombel')->error();
            return back(); // Kembali ke halaman sebelumnya dengan pesan error
        }

        // Jika siswa tidak terhubung dengan rombel, hapus data siswa
        $siswa->delete();
        flash('Siswa berhasil dihapus')->success();
        return back(); // Kembali ke halaman sebelumnya dengan pesan sukses
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new SiswaImport, $request->file('file'));

        return back()->with('success', 'Data siswa berhasil diimport!');
    }

    // Metode untuk memperbarui relasi rombel
    // private function updateRombelRelations()
    // {
    //     $siswas = Siswa::all();

    //     foreach ($siswas as $siswa) {
    //         // Cari rombel_id berdasarkan data di tabel 'rombels'
    //         $rombel = rombel::where('rombel_id', $siswa->rombel_id)->first();

    //         if ($rombel) {
    //             // Perbarui data siswa dengan rombel_id yang valid
    //             $siswa->rombel_id = $rombel->rombel_id;
    //             $siswa->save();
    //         }
    //     }
    // }
}
