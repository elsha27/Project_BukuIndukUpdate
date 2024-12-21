<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class siswa extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function rombel(): BelongsTo
    {
        return $this->belongsTo(Rombel::class, 'tingkat_rombel');
    }
}