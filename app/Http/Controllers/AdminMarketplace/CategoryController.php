<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Str;

use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
         $jenissparepart = Category::where('status_jenis','=','Aktif')->get();
         $jenissparepartpengajuan = Category::where('status_jenis','=','Diajukan')->get();

         $jenissparepartaktif = Category::where('status_jenis','=','Aktif')->count();
         $jenisspareparttidakaktif = Category::where('status_jenis','=','Tidak Aktif')->count();
         $jenissparepartdiajukan= Category::where('status_jenis','=','Diajukan')->count();
        //  dd($jenissparepart);
        return view('admin-views.pages.category.index',compact('jenissparepart','jenissparepartpengajuan','jenissparepartaktif','jenisspareparttidakaktif','jenissparepartdiajukan'));
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
    public function store(CategoryRequest $request)
    {
        $data = $request ->all();
        
        $data['status_jenis'] = 'Aktif';
        $data['slug'] = Str::slug($request->jenis_sparepart);

        // dd($data);
        Category::create($data);
        return redirect()->route('category.index')
            ->with('messageberhasil','Data Jenis Sparepart Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id_jenis_sparepart)
    {
        $data = $request ->all();
        $data['slug'] = Str::slug($request->jenis_sparepart);

        $item = Category::findOrFail($id_jenis_sparepart);
        $item -> update($data);
        return redirect()->route('category.index')
            ->with('messageberhasil','Data Jenis Sparepart Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Category::findOrFail($id);
        $item->delete();

         return redirect()->route('category.index')
            ->with('messageberhasil','Data Jenis Sparepart Berhasil DiHapus');
   
    }

    public function setStatus(Request $request, $id_jenis_sparepart)
    {

        $item = Category::findOrFail($id_jenis_sparepart);
        $item->status_jenis = $request->status_jenis;
        
        $item->save();
        return redirect()->back()->with('messageberhasil', 'Data Pengajuan Jenis Sparepart Berhasil di Proses');
    }

}
