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
        return $this->hasOne(Rombel::class, 'nik', 'nik'); 
    }
    public function sk()
    {
        return $this->hasMany(Sk_guru::class, 'nik', 'nik'); // Menyesuaikan relasi dengan kolom nik
    }
}
