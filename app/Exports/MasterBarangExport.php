<?php

namespace App\Exports;

use App\Models\MasterBarang;
use Maatwebsite\Excel\Concerns\FromCollection;

class MasterBarangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return MasterBarang::all();
    }
}
