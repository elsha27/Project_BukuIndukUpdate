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
        return $this->hasMany(siswa::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'nik', 'nik'); // Relasi 'belongsTo' berarti Rombel berhubungan dengan satu Guru
    }
}
