<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nama_pengunjung',
        'email',
        'no_hp',
        'tanggal_kunjungan',
        'jumlah_orang',
        'total_biaya',
        'status',
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
    ];
}