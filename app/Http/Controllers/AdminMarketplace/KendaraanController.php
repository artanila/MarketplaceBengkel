<?php

namespace App\Http\Controllers\AdminMarketplace;

use App\Http\Controllers\Controller;
use App\Model\MasterData\JenisKendaraan;
use App\Model\MasterData\Kendaraan;
use App\Model\MasterData\MerkKendaraan;
use App\Model\SingleSignOn\JenisBengkel;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraanmobil = Kendaraan::with('Merk','Jenis','JenisBengkel')->where('status','=','Aktif')->where('id_jenis_bengkel','=','1')->get();
        $kendaraanmotor = Kendaraan::with('Merk','Jenis','JenisBengkel')->where('status','=','Aktif')->where('id_jenis_bengkel','=','2')->get();

        $countkendaraanaktif = Kendaraan::where('status','=','Aktif')->where('id_jenis_bengkel','=','1')->count();
        $countkendaraanaktifmotor = Kendaraan::where('status','=','Aktif')->where('id_jenis_bengkel','=','2')->count();
        $countkendaraandiajukan = Kendaraan::where('status','=','Diajukan')->count();

        $kendaraanpengajuan = Kendaraan::where('status','=','Diajukan')->get();

            $id = Kendaraan::getId();
            foreach($id as $value);
            $idlama = $value->id_kendaraan;
            $idbaru = $idlama + 1;
            $blt = date('m');

        $kode_kendaraan = 'KD-'.$blt.'/'.$idbaru;
        $merk = MerkKendaraan::get();
        $jenis = JenisKendaraan::get();
        $jenis_bengkel = JenisBengkel::get();

        return view('admin-views.pages.kendaraan.index',compact('jenis_bengkel','merk','kode_kendaraan','jenis','kendaraanmobil','kendaraanmotor','countkendaraanaktif','countkendaraanaktifmotor','countkendaraandiajukan','kendaraanpengajuan'));
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
        $kendaraan = new Kendaraan;
        $kendaraan->nama_kendaraan = $request->nama_kendaraan;
        $kendaraan->kode_kendaraan = $request->kode_kendaraan;
        $kendaraan->id_jenis_kendaraan = $request->id_jenis_kendaraan;
        $kendaraan->id_merk_kendaraan = $request->id_merk_kendaraan;
        $kendaraan->id_jenis_bengkel = $request->id_jenis_bengkel;
        $kendaraan->status = 'Aktif';

        $kendaraan->save();
        return redirect()->back()->with('messageberhasil','Data Kendaraan Berhasil ditambahkan');
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
    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::find($id);
        $kendaraan->nama_kendaraan = $request->nama_kendaraan;
        $kendaraan->kode_kendaraan = $request->kode_kendaraan;
        $kendaraan->id_jenis_kendaraan = $request->id_jenis_kendaraan;
        $kendaraan->id_merk_kendaraan = $request->id_merk_kendaraan;
        $kendaraan->id_jenis_bengkel = $request->id_jenis_bengkel;
        $kendaraan->status = 'Aktif';

        $kendaraan->update();
        return redirect()->back()->with('messageberhasil','Data Kendaraan Berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kendaraan = Kendaraan::find($id);
        $kendaraan->delete();
        return redirect()->back()->with('messagehapus','Data Kendaraan Berhasil dihapus');
    }

    public function setStatus(Request $request, $id_kendaraan)
    {

        $item = Kendaraan::find($id_kendaraan);
        $item->status = $request->status;
        
        $item->save();
        return redirect()->back()->with('messageberhasil', 'Data Pengajuan Kendaraan Berhasil di Proses');
    }
}
