<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sk_guru extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'nik', 'nik'); // Menyesuaikan relasi dengan kolom nik
    }
}
