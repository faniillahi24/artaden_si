<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaniFasilitas extends Model
{
    
    protected $fillable = [];

    public function reservasi()
    {
        return $this->belongsToMany(FaniReservasi::class, 'fani_reservasi_fasilitas')
                    ->withPivot('jumlah', 'subtotal');
    }
}
