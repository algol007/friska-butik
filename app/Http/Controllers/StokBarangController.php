<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\KodeBarang;
use App\Models\StokBarang;
use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
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
        $barangmasuk = BarangMasuk::all();
        $barangkeluar = BarangKeluar::all();
        return view('availability', compact('kodebarang_list', 'jumlah_kodebarang', 'barangmasuk', 'barangkeluar'));
    }

    /**
     * Search data from the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
		$keyword = $request->search;
        $barangmasuk = BarangMasuk::all();
        $barangkeluar = BarangKeluar::all();
        $kodebarang_list = KodeBarang::where('nama_barang', 'like', "%" . $keyword . "%")->orWhere('kode_barang', 'like', "%" . $keyword . "%")->paginate(10);

        return view('availability', compact('kodebarang_list', 'barangmasuk', 'barangkeluar'));
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
        $barangmasuk = BarangMasuk::all();
        $barangkeluar = BarangKeluar::all();
        return view('preview.availability', compact('kodebarang', 'barangmasuk', 'barangkeluar'));
    }

    public function cetak_pdf()
    {
        $kodebarang = KodeBarang::all();
        $barangmasuk = BarangMasuk::all();
        $barangkeluar = BarangKeluar::all();

        $pdf = PDF::loadview('preview.availability', compact('kodebarang', 'barangmasuk', 'barangkeluar'));
        return $pdf->stream();

        // $kodebarang = KodeBarang::all();

        // $pdf = PDF::loadview('preview.availability',['kodebarang'=>$kodebarang]);
        // return $pdf->stream();
    }
}
