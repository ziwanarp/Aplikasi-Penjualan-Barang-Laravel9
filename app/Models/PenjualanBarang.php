<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanBarang extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];
    // protected $with = ['id_barang'];

    public function masterbarang()
    {
        return $this->belongsTo(MasterBarang::class);
    }


    public function getRouteKeyName()
    {
        return 'nomor_penjualan';
    }
}
