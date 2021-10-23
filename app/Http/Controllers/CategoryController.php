<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_list = Category::orderBy('created_at', 'desc')->paginate(10);
        $jumlah_kategori = Category::count();
        return view('category', compact('kategori_list', 'jumlah_kategori'))->with('no', 1);
    }

    /**
     * Search data from the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
		$search = $request->search;

        $kategori_list = DB::table('categories')
        ->where('nama_kategori','like',"%".$search."%")
        ->paginate(10);

        return view('category', compact('kategori_list'))->with('no', 1);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->only(['nama_kategori']);
        $validator = Validator::make($input, [
            'nama_kategori' => 'required|string|max:30',
        ]);

        if($validator->fails()) {
            return redirect('category')
                ->withInput()
                ->withErrors($validator);
        }

        $kategori = Category::create($input);
        return redirect("kategori")->with('success', 'Successfully Add Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori = Category::findOrFail($id);
        $input = $request->all();
        
        $validator = Validator::make($input, [
            'nama_kategori' => 'required|string|max:30',
        ]);

        if($validator->fails()) {
            return redirect('kategori')
                ->withInput()
                ->withErrors($validator);
        }

        $kategori->update($request->all());

        return redirect('kategori')->with('success', 'Successfully Update Data');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Category::findOrFail($id);
        $kategori->delete();
        return redirect('kategori');      
    }
}
