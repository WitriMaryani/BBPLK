<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_sub_kejuruan;
use App\tb_m_kejuruan;
use Session;

class Sub_kejuruanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sub_kejuruan = tb_m_sub_kejuruan::all();
        $kejuruan = tb_m_kejuruan::all();
        return view('sub_kejuruan.index',compact('sub_kejuruan','kejuruan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sub_kejuruan = tb_m_sub_kejuruan::where('id');
        $kejuruan = tb_m_kejuruan::all();
        return view('sub_kejuruan.create',compact('sub_kejuruan','kejuruan'));
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
        $this->validate($request,['kd_sub_kejuruan'=>'required|unique:tb_m_sub_kejuruans']);
        $kejuruan = tb_m_kejuruan::all();
        $sub_kejuruan = new tb_m_sub_kejuruan;
        $sub_kejuruan->kd_sub_kejuruan = $request->kd_sub_kejuruan;
        $sub_kejuruan->nama_sub_Kejuruan = $request->nama_sub_kejuruan;
        $sub_kejuruan->kd_kejuruan = $request->kd_kejuruan;
        $sub_kejuruan->keterangan = $request->keterangan;
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $sub_kejuruan"
            ]);
        $sub_kejuruan->save();
        return redirect()->route('sub_kejuruan.index');
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
        $kejuruan = tb_m_kejuruan::all();
        $sub_kejuruan = tb_m_sub_kejuruan::findOrFail($id);
        return view('sub_kejuruan.edit',compact('sub_kejuruan','kejuruan'));
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
        $kejuruan = tb_m_kejuruan::all();
        $sub_kejuruan = tb_m_sub_kejuruan::findOrFail($id);
        $sub_kejuruan->kd_sub_kejuruan = $request->kd_sub_kejuruan;
        $sub_kejuruan->nama_sub_Kejuruan = $request->nama_sub_kejuruan;
        $sub_kejuruan->kd_kejuruan = $request->kd_kejuruan;
        $sub_kejuruan->keterangan = $request->keterangan;
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $sub_kejuruan"
            ]);
        $sub_kejuruan->save();
        return redirect()->route('sub_kejuruan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request)
    {
        //
        $ids = $request->ids;
        $kejuruan = tb_m_kejuruan::all();
        tb_m_sub_kejuruan::destroy($ids);
        $sub_kejuruan->delete();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Data Sub Kejuruan berhasil dihapus"
            ]);
        return redirect()->route('sub_kejuruan.index');
    }
    public function search(Request $request)
    {
        $caril = $request->get('search');
        $sub_kejuruan = tb_m_sub_kejuruan::where('kd_sub_kejuruan','LIKE','%'.$caril.'%')->paginate(10);
        return view('sub_kejuruan.index',compact('sub_kejuruan'));
    }
}
