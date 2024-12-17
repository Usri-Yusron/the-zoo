<?php

namespace App\Models;

use App\Models\Hewan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Habitat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'detail'
    ];

    public function hewan()
    {
        return $this->hasMany(Hewan::class);
    }
}
