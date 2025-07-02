<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'fani_testimonis';

    protected $fillable = [
        'nama',
        'pesan',
        'foto',
    ];
}
