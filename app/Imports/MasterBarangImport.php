<?php

namespace App\Imports;

use App\Models\MasterBarang;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;

class MasterBarangImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        // Set Kode Barang berdasarkan id
        $mstrbrg = DB::table('master_barangs')->max('id');
        $no = $mstrbrg;
        $numeric_id = intval($no + 1);

        if (mb_strlen($numeric_id) == 1) {
            $zero_string = '00';
        } elseif (mb_strlen($numeric_id) == 2) {
            $zero_string = '0';
        } else {
            $zero_string = '';
        }
        $kd_brg = 'BRG' . $zero_string . $numeric_id;

        return new MasterBarang([
            'kode_barang' => $kd_brg,
            'nama_barang'  => $row[0],
            'satuan'    => $row[1],
            'qty' => $row[2],
            'harga' => $row[3],
        ]);
    }
}
