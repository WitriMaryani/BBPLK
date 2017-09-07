<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_kejuruan;
use Session;

class KejuruanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kejuruan = tb_m_kejuruan::all();
        return view('kejuruan.index',compact('kejuruan'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kejuruan = tb_m_kejuruan::where('id');
        return view('kejuruan.create',compact('kejuruan'));
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
        $this->validate($request,['kd_kejuruan'=>'required|unique:tb_m_kejuruans']);
        $kejuruan = new tb_m_kejuruan;
        $kejuruan->kd_kejuruan = $request->kd_kejuruan;
        $kejuruan->nama_Kejuruan = $request->nama_kejuruan;
        $kejuruan->keterangan = $request->keterangan;
        Session::flash("flash_notification", [
            "level"=>"info",
            "message"=>"Berhasil menyimpan data"
            ]);
        $kejuruan->save();
        return redirect()->route('kejuruan.index');
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
        $kejuruan = tb_m_kejuruan::findOrFail($id);
        return view('kejuruan.edit',compact('kejuruan'));
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
        //
        $kejuruan = tb_m_kejuruan::findOrFail($id);
        $kejuruan->kd_kejuruan = $request->kd_kejuruan;
        $kejuruan->nama_Kejuruan = $request->nama_kejuruan;
        $kejuruan->keterangan = $request->keterangan;
        Session::flash("flash_notification", [
            "level"=>"warning",
            "message"=>"Berhasil Menyimpan Data"
            ]);
        $kejuruan->save();
        return redirect()->route('kejuruan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $ids = $request->ids;
        tb_m_kejuruan::destroy($ids);
        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Data Kejuruan berhasil dihapus"
            ]);
        return redirect()->route('kejuruan.index');
    }

    public function search(Request $request)
    {
        $cari = $request->get('search');
        $kejuruan = tb_m_kejuruan::where('nama_kejuruan','LIKE','%'.$cari.'%')->paginate(10);
        return view('kejuruan.index',compact('kejuruan'));
    }
}
