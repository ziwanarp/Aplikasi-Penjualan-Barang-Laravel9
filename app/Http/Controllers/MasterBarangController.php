<?php

namespace App\Http\Controllers;

use App\Exports\MasterBarangExport;
use App\Models\MasterBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\MasterBarangImport;
use Maatwebsite\Excel\Facades\Excel;

class MasterBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.masterbarang.index', [
            'title' => 'Master Barang',
            'master_barang' => MasterBarang::paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.masterbarang.create', [
            'title' => 'Tambah Barang',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $rules = [
            // 'kode_barang' => 'required|unique:master_barang',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'qty' => 'required',
            'harga' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['kode_barang'] = $kd_brg;

        MasterBarang::create($validatedData);

        return redirect('/masterbarang')->with('success', 'Data Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterBarang  $masterBarang
     * @return \Illuminate\Http\Response
     */
    public function get(MasterBarang $masterbarang)
    {
        echo json_encode(MasterBarang::where('id', $masterbarang->id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterBarang  $masterBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterBarang $masterbarang)
    {
        return view('dashboard.masterbarang.edit', [
            'title' => 'Edit Data Barang',
            'mb' => $masterbarang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterBarang  $masterBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterBarang $masterbarang)
    {
        $rules = [
            // 'kode_barang' => 'required|unique:master_barang',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'qty' => 'required',
            'harga' => 'required',
        ];


        $validatedData = $request->validate($rules);

        $validatedData['kode_barang'] = $masterbarang->kode_barang;

        MasterBarang::where('id', $masterbarang->id)->update($validatedData);

        return redirect('/masterbarang')->with('success', 'Data Barang berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterBarang  $masterBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterBarang $masterbarang)
    {

        MasterBarang::destroy($masterbarang->id);
        return redirect('/masterbarang')->with('success', 'Data barang behasil dihapus !');
    }

    public function importBarang(Request $request)
    {
        Excel::import(new MasterBarangImport, $request->file('file')->store('temp'));

        return redirect('/masterbarang')->with('success', 'Data Barang telah di Import !');
    }

    public function exportBarang()
    {
        return Excel::download(new MasterBarangExport, 'data_barang.xlsx');
    }
}
