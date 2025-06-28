<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaniFasilitas extends Model
{
    
    protected $table = 'fani_fasilitas';
     protected $fillable = [
        'nama_fasilitas',
        'deskripsi',
        'tipe_fasilitas',
        'harga',
        'foto',
    ];

    public function reservasi()
    {
        return $this->belongsToMany(
            FaniReservasi::class, 
            'fani_reservasi_fasilitas',
            'fasilitas_id',                 // Foreign key di pivot ke FaniFasilitas
            'reservasi_id'   
            )->withPivot('jumlah', 'subtotal');
    }
}
