<?php

namespace App\Http\Controllers;

use App\Models\MasterBarang;
use App\Models\PenjualanBarang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PenjualanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // jika ada requset = nomor_penjualan, load view detail
        if (request('nomorpenjualan')) {
            return view('dashboard.penjualanbarang.detail', [
                'title' => 'Detail Penjualan Barang',
                'nomor_penjualan' => PenjualanBarang::Where('nomor_penjualan', request('nomorpenjualan'))->get(),
            ]);
        } else {
            // jika tidak ada request, tampilkan index
            return view('dashboard.penjualanbarang.index', [
                'title' => 'Penjualan Barang',
                'penjualan_barang' => PenjualanBarang::all(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.penjualanbarang.create', [
            'title' => 'Penjualan Barang',
            'master_barang' => MasterBarang::all(),
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

        $rules = [
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'tanggal' => 'required',
            'id_barang' => 'required',
            'satuan' => 'required',
            'qty' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
        ];

        $validatedData = $request->validate($rules);

        // buat nomor penjualan SO_tanggal sekarang
        $tgl = preg_replace("/[^a-zA-Z0-9]/", "", date("Y-m-d"));
        $validatedData['nomor_penjualan'] = 'SO_' . $tgl;

        // hitung diskon
        $harga = $validatedData['harga'] * $validatedData['qty'];
        $total = ($harga * $validatedData['diskon']) / 100;

        //hitung subtotal
        $validatedData['subtotal'] = $harga - $total;

        // Qty master barang dikurangi dari qty penjualan berdasarkan id
        $qty = MasterBarang::where('id', $validatedData['id_barang'])->get();
        $result = $qty[0]->qty - $validatedData['qty'];
        if ($qty[0]->qty < $validatedData['qty']) {
            return redirect('/penjualanbarang/create')->with('error', 'Qty tersedia tidak mencukupi!!');
        }
        MasterBarang::where('id', $validatedData['id_barang'])->update(['qty' => $result]);


        PenjualanBarang::create($validatedData);

        return redirect('/penjualanbarang')->with('success', 'Data penjualan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenjualanBarang  $penjualanBarang
     * @return \Illuminate\Http\Response
     */
    public function show(PenjualanBarang $penjualanbarang)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenjualanBarang  $penjualanBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(PenjualanBarang $penjualanBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenjualanBarang  $penjualanBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenjualanBarang $penjualanBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenjualanBarang  $penjualanBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenjualanBarang $penjualanBarang)
    {
        PenjualanBarang::destroy($penjualanBarang->id);

        return redirect('/penjualanbarang')->with('success', 'Data penjualan behasil dihapus !');
    }

    public function getpdf($penjualanbarang)
    {
        $data = PenjualanBarang::where('nomor_penjualan', $penjualanbarang)->get();
        // return view('dashboard.penjualanbarang.getpdf', compact('data'));

        $tanggals = $data[0]->tanggal;
        $pdf = PDF::loadView('dashboard.penjualanbarang.getpdf', compact('data'));
        return $pdf->stream('penjualan_' . $tanggals . '.pdf');
    }
}
