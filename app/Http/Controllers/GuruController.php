<?php

namespace App\Http\Controllers;

use id;
use App\Models\guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('admin.guru_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'user') {
                return view('user.guru_create');
            } elseif (Auth::user()->role == 'admin') {
                return view('admin.guru_create');
            }
        }
        return redirect('/login'); // Pengguna tidak terautentikasi, arahkan ke halaman login
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diinputkan oleh pengguna
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

        $guru = new Guru();
        $guru->fill($requestData);

        // Cek apakah pengguna yang login adalah 'user' dan jika iya, simpan user_id
        if (Auth::user()->role == 'user') {
            $guru->user_id = Auth::id(); // Mengambil ID pengguna yang sedang login
        }

        // Simpan file-file yang diupload
        $fields = ['foto', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_s1', 'ijazah_s2', 'sk_yayasan', 'sk_tugas', 'kartukeluarga', 'ktp'];
        foreach ($fields as $field) {
            if ($request->hasFile($field)) {
                // Simpan file baru ke storage 'public'
                $guru->$field = $request->file($field)->store('guru', 'public');
            }
        }

        // Simpan data guru ke database
        $guru->save();

        // Memberikan pesan sukses setelah data disimpan
        flash('Data berhasil disimpan.')->success();

        // Redirect berdasarkan role pengguna
        if (Auth::check()) {
            if (Auth::user()->role == 'user') {
                return redirect('/user/guru/show');
            } elseif (Auth::user()->role == 'admin') {
                return view('admin.guru_index');
            }
        }
        return redirect('/login'); // Pengguna tidak terautentikasi, arahkan ke halaman login
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $guru = guru::findOrFail($id);
        // Ambil semua SK yang dimiliki oleh guru
        $skGurus = $guru->sk;

        // Kirimkan data guru dan SK ke view
        return view('admin.guru_show', compact('guru', 'skGurus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['guru'] = guru::findOrFail($id); //seperti mencari buku sesuai id di lemari
        if (Auth::check()) {
            if (Auth::user()->role == 'user') {
                return view('user.guru_edit', $data);
            } elseif (Auth::user()->role == 'admin') {
                return view('admin.guru_edit', $data);
            }
        }
        return redirect('/login'); // Pengguna tidak terautentikasi, arahkan ke halaman login
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
            // 'status' => 'required | in:Aktif,Tidak Aktif',
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
        $fields = ['foto', 'ijazah_sd', 'ijazah_smp', 'ijazah_sma', 'ijazah_s1', 'ijazah_s2', 'kartukeluarga', 'ktp'];

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
        if (Auth::check()) {
            if (Auth::user()->role == 'user') {
                return redirect('/user/guru/show');
            } elseif (Auth::user()->role == 'admin') {
                return redirect('/admin/guru');
            }
        }
        return redirect('/login');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = guru::findOrFail($id);
        if ($guru->rombel()->exists()) {
            flash('Data tidak bisa dihapus karena data sudah masuk pada rombel')->error();
            return back();
        }

        $guru->delete();
        flash('Data sudah dihapus')->success();
        return back();
    }

    public function showFoto($id)
    {
        $guru = Guru::findOrFail($id);
        return response()->file(storage_path('app/public/' . $guru->foto));
    }

    public function showGuru($id)
    {
        // Ambil data guru berdasarkan ID dan pastikan user yang login adalah pemilik data tersebut
        $guru = Guru::where('id', $id)
            ->where('user_id', Auth::id())  // Pastikan hanya data guru milik user yang login yang bisa ditampilkan
            ->firstOrFail();
        // Menampilkan halaman dengan data guru
        return view('user.guru_show', compact('guru'));
    }

    public function showUser()
{
    // Cek jika pengguna terautentikasi
    if (Auth::check()) {
        // Pastikan pengguna yang login adalah 'user'
        if (Auth::user()->role == 'user') {
            // Ambil data guru berdasarkan user_id yang login
            $guru = Guru::where('user_id', Auth::id()) // Filter berdasarkan user_id
                ->first();

            // Jika guru tidak ditemukan, arahkan ke halaman create
            if (!$guru) {
                return redirect()->route('guru.create')->with('error', 'Data guru tidak ditemukan. Silakan buat data guru terlebih dahulu.');
            }

            // Ambil data SK yang terkait dengan guru
            $skGurus = $guru->sk;

            // Kirimkan data guru dan SK ke view
            return view('user.guru_show', compact('guru', 'skGurus'));
        }
    }

    // Jika pengguna tidak terautentikasi atau bukan user, arahkan ke halaman login
    return redirect('/login');
}

}
