<?php

namespace App\Http\Controllers;

use App\Models\PenjualanBarang;
use Illuminate\Http\Request;

class LaporanPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.laporanpenjualan.index', [
            'title' => 'Penjualan Barang',
            'penjualan_barang' => PenjualanBarang::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenjualanBarang  $penjualanBarang
     * @return \Illuminate\Http\Response
     */
    public function show(PenjualanBarang $penjualanBarang)
    {
        //
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
        //
    }
}
