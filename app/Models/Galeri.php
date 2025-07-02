<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'fani_galeri';
    protected $fillable = ['judul','gambar'];
}
