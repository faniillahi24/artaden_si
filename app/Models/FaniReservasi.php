<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaniReservasi extends Model
{
    protected $fillable = [];

    public function fasilitas()
    {
        return $this->belongsToMany(FaniFasilitas::class, 'fani_reservasi_fasilitas')
                    ->withPivot('jumlah', 'subtotal');
    }
}
