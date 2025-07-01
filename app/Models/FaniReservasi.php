<?php

namespace App\Models;

use App\Models\FaniReservasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FaniReservasi extends Model
{
    use HasFactory;

    protected $table = 'fani_reservasis';
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

   public function fasilitas()
{
    return $this->belongsToMany(FaniFasilitas::class, 'fani_reservasi_fasilitas', 'reservasi_id', 'fasilitas_id')
        ->withPivot('jumlah', 'subtotal')
        ->withTimestamps(); 
}
 
}