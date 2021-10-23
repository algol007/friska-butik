<?php

namespace App\Http\Controllers;
use App\Models\KodeBarang;
use App\Models\StokBarang;
use Illuminate\Http\Request;
use PDF;

class StokBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kodebarang_list = KodeBarang::orderBy('created_at', 'desc')->paginate(10);
        $jumlah_kodebarang = KodeBarang::count();
        return view('availability', compact('kodebarang_list', 'jumlah_kodebarang'))->with('no', 1);
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
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function show(StokBarang $stokBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(StokBarang $stokBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StokBarang $stokBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StokBarang  $stokBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(StokBarang $stokBarang)
    {
        //
    }

    public function cetak_preview()
    {
        $kodebarang = KodeBarang::all();
        return view('preview.availability', compact('kodebarang'));
    }

    public function cetak_pdf()
    {
        $kodebarang = KodeBarang::all();

        $pdf = PDF::loadview('preview.availability',['kodebarang'=>$kodebarang]);
        return $pdf->stream();
    }
}
