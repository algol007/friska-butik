<?php

namespace App\Http\Controllers;

use App\Models\KodeBarang;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KodeBarangController extends Controller
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
        $kategori_list = Category::all();
        return view('code', compact('kodebarang_list', 'jumlah_kodebarang', 'kategori_list'))->with('no', 1);
    }

    /**
     * Search data from the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
		$keyword = $request->search;
        $kodebarang_list = KodeBarang::where('nama_barang', 'like', "%" . $keyword . "%")->paginate(10);
        $kategori_list = Category::all();

        return view('code', compact('kodebarang_list', 'kategori_list'))->with('no', 1);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                $validated = $request->validate([
                    'id_kategori' => 'required', 
                    'kode_barang' => 'required', 
                    'nama_barang' => 'required', 
                    'harga' => 'required',
                    'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $foto = time().'.'.$request->foto->extension();  
                $request->foto->move(public_path('img'), $foto);
        
                $file = KodeBarang::create([
                    'id_kategori' => $validated['id_kategori'],
                    'kode_barang' => $validated['kode_barang'],
                    'nama_barang' => $validated['nama_barang'],
                    'harga' => $validated['harga'],
                    'foto' => $foto,
                ]);

                return redirect("kode-barang")->with('success', 'Successfully Add Data');
            }
        }

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
        
        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                $validated = $request->validate([
                    'id_kategori' => 'required', 
                    'kode_barang' => 'required', 
                    'nama_barang' => 'required', 
                    'harga' => 'required',
                    'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                $foto = time().'.'.$request->foto->extension();  
                $request->foto->move(public_path('img'), $foto);
        
                $kodebarang->update([
                    'id_kategori' => $validated['id_kategori'],
                    'kode_barang' => $validated['kode_barang'],
                    'nama_barang' => $validated['nama_barang'],
                    'harga' => $validated['harga'],
                    'foto' => $foto,
                ]);

                return redirect("kode-barang")->with('success', 'Successfully Add Data');
            }
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
