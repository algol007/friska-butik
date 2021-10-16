<?php

namespace App\Http\Controllers;
use App\Models\KodeBarang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halaman = 'Barang Keluar';
        $barangkeluar_list = BarangKeluar::orderBy('created_at', 'desc')->paginate(10);
        $jumlah_barangkeluar = BarangKeluar::count();
        $kodebarang_list = KodeBarang::all();
        return view('itemout', compact('halaman', 'barangkeluar_list', 'jumlah_barangkeluar', 'kodebarang_list'))->with('no', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hobi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->only(['id_kode_barang', 'tanggal_keluar','jumlah']);
        $validator = Validator::make($input, [
            'id_kode_barang' => 'required', 
            'tanggal_keluar' => 'required', 
            'jumlah' => 'required', 
        ]);

        if($validator->fails()) {
            return redirect('barang-masuk')
                ->withInput()
                ->withErrors($validator);
        }

        $barangkeluar = BarangKeluar::create($input);
        return redirect("barang-keluar")->with('success', 'Successfully Add Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(BarangKeluar $barangKeluar)
    {
        // $halaman = 'hobi';
        // $hobi = Hobi::findOrFail($id);
        // return view('hobi.show', compact('halaman', 'hobi'));      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangKeluar $barangKeluar)
    {
        // $hobi = Hobi::findOrFail($id);
        // return view('hobi.edit', compact('hobi'));      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        // $hobi = Hobi::findOrFail($id);
        // $input = $request->all();
        
        // $validator = Validator::make($input, [
        //     'nama_hobi' => 'required|string|max:30',
        // ]);
    
        // if($validator->fails()) {
        //     return redirect('hobi/'. $id . '/edit')
        //         ->withInput()
        //         ->withErrors($validator);
        // }

        // $hobi->update($request->all());

        // return redirect('hobi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangKeluar  $barangKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        $barangkeluar->delete();
        return redirect('barang-keluar');      
    }
}
