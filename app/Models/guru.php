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
        return $this->hasOne(Rombel::class);
    }
}
