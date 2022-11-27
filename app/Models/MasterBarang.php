<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function penjualanbarang()
    {
        return $this->hasMany(PenjualanBarang::class);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}

