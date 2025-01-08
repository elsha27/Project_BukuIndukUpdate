<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $data['User'] = User::latest()->paginate(10);
        return view('admin.user_index', $data);
    }

    public function destroy($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::findOrFail($id);

        // Perbarui kolom user_id di tabel guru menjadi NULL
        guru::where('user_id', $user->id)->update(['user_id' => null]);

        // Hapus pengguna
        $user->delete();

        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus tanpa menghapus data guru terkait.');
    }
}
