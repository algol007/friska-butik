<?php

namespace App\Http\Controllers;
use App\Models\KodeBarang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halaman = 'Barang Masuk';
        $barangmasuk_list = BarangMasuk::orderBy('created_at', 'desc')->paginate(10);
        $jumlah_barangmasuk = BarangMasuk::count();
        $kodebarang_list = KodeBarang::all();
        return view('itemin', compact('halaman', 'barangmasuk_list', 'jumlah_barangmasuk', 'kodebarang_list'))->with('no', 1);
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
        $input=$request->only(['id_kode_barang', 'tanggal_masuk','jumlah']);
        $validator = Validator::make($input, [
            'id_kode_barang' => 'required', 
            'tanggal_masuk' => 'required', 
            'jumlah' => 'required', 
        ]);

        if($validator->fails()) {
            return redirect('barang-masuk')
                ->withInput()
                ->withErrors($validator);
        }

        $barangmasuk = BarangMasuk::create($input);
        return redirect("barang-masuk")->with('success', 'Successfully Add Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangMasuk  $barangMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangmasuk = BarangMasuk::findOrFail($id);
        $barangmasuk->delete();
        return redirect('barang-masuk');      
    }
}
