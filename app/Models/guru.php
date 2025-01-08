<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function rombel()
    {
        return $this->hasMany(Rombel::class, 'nik', 'nik'); // Relasi 'hasMany' berarti Guru dapat memiliki banyak Rombel
    }
    public function sk()
    {
        return $this->hasMany(Sk_guru::class, 'nik', 'nik'); // Menyesuaikan relasi dengan kolom nik
    }
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(); // Anggap 1 guru hanya memiliki 1 user
    }
}
