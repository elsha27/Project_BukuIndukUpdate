<?php

namespace App\Imports;

use App\Models\siswa;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon; 
use Maatwebsite\Excel\Concerns\WithStartRow;// Tambahkan ini untuk menggunakan Carbon

class SiswaImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new siswa([
            'nama' => $row[1],
            'nisn' => $row[2],
            'nik' => $row[3],
            'tempat_lahir' => $row[4],
            'tanggal_lahir' => $row[5],
            'tingkat_rombel' => $row[6] ,
            'umur' => $row[7],
            'status' => $row[8],
            'jenis_kelamin' => $row[9],
            'alamat' => $row[10],
            'no_hp' => $row[11],
            'kebutuhan_khusus'  => $row[12],
            'disabilitas' => $row[13],
            'nomor_kip' => $row[14],
            'nama_ayah' => $row[15],
            'nama_ibu' => $row[16],
            'nama_wali' => $row[17],
        ]);
    }
    
    public function startRow(): int
    {
        return 2;
    }
    /**
     * Konversi tanggal ke format Y-m-d atau null jika tidak valid.
     */
    private function parseTanggalLahir($date)
    {
        if (!$date || !is_string($date)) {
            return '1970-01-01'; // Default jika kosong
        }
    
        try {
            return Carbon::parse($date)->format('Y-m-d');
        } catch (\Exception $e) {
            return '1970-01-01'; // Default jika parsing gagal
        }
    }
    private function validateStatus($status)
    {
        $validStatuses = ['Aktif', 'Tidak Aktif']; // Sesuaikan dengan ENUM di database
        return in_array($status, $validStatuses) ? $status : 'Tidak Aktif'; // Default jika invalid
    }
    private function validateJenisKelamin($jenisKelamin)
    {
        $validGenders = ['Laki-laki', 'Perempuan'];
        return in_array($jenisKelamin, $validGenders) ? $jenisKelamin : 'Laki-laki'; // Default jika invalid
    }
    
    
}