<?php

namespace App\Http\Controllers;

use App\Models\KodeBarang;
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
        return view('code', compact('halaman', 'kodebarang_list', 'jumlah_kodebarang'))->with('no', 1);
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
            'nama_hobi' => 'required|string',
        ]);

        if($validator->fails()) {
            return redirect('hobi/create')
                ->withInput()
                ->withErrors($validator);
        }

        $hobi = Hobi::create($input);

        return redirect('hobi');
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
    public function update(Request $request, KodeBarang $kodeBarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KodeBarang  $kodeBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(KodeBarang $kodeBarang)
    {
        //
    }
}
