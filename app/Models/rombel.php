<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class rombel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function siswa(): HasMany{
        return $this->hasMany(Siswa::class, 'tingkat_rombel'); // Kolom 'tingkat_rombel' adalah foreign key di tabel siswas
    }
}
