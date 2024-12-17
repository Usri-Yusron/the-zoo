<?php

namespace App\Models;

use App\Models\Habitat;
use App\Models\Makanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hewan extends Model
{
    use HasFactory;

    protected $fillable = [
        'habitat_id',
        'makanan_id',
        'nama',
        'tentang',
        'detail_makanan',
        'panjang',
        'berat',
        'tinggi',
        'image',
    ];

    public function habitat()
    {
        return $this->belongsTo(Habitat::class);
    }

    public function makanan()
    {
        return $this->belongsTo(Makanan::class);
    }
}

