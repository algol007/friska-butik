<?php

namespace App\Http\Controllers;

use App\Models\KodeBarang;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KodeBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $halaman = 'Kode Barang';
        $kodebarang_list = KodeBarang::orderBy('created_at', 'desc')->paginate(10);
        $jumlah_kodebarang = KodeBarang::count();
        $kategori_list = Category::all();
        return view('code', compact('halaman', 'kodebarang_list', 'jumlah_kodebarang', 'kategori_list'))->with('no', 1);
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
        $input = $request->all();
        $validator = Validator::make($input, [
            'id_kategori' => 'required', 
            'kode_barang' => 'required', 
            'nama_barang' => 'required', 
            'harga' => 'required',
        ]);

        if($validator->fails()) {
            return redirect('kode-barang')
                ->withInput()
                ->withErrors($validator);
        }

        $kodebarang = KodeBarang::create($input);
        return redirect("kode-barang")->with('success', 'Successfully Add Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KodeBarang  $kodeBarang
     * @return \Illuminate\Http\Response
     */
    public function show(KodeBarang $kodeBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KodeBarang  $kodeBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(KodeBarang $kodeBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KodeBarang  $kodeBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kodebarang = KodeBarang::findOrFail($id);
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'id_kategori' => 'required', 
            'kode_barang' => 'required', 
            'nama_barang' => 'required', 
            'harga' => 'required',
        ]);

        if($validator->fails()) {
            return redirect('kategori')
                ->withInput()
                ->withErrors($validator);
        }

        $kodebarang->update($request->all());

        return redirect('kode-barang')->with('success', 'Successfully Update Data');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodeBarang  $kodeBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kodebarang = KodeBarang::findOrFail($id);
        $kodebarang->delete();
        return redirect('kode-barang');      
    }
}
