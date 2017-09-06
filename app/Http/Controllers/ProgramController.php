<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_m_program;
use App\tb_m_sub_kejuruan;
use App\tb_m_kejuruan;
use Session;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $program = tb_m_program::all();
        $kejuruan = tb_m_kejuruan::all();
        $sub_kejuruan = tb_m_sub_kejuruan::all();
        return view('program.index',compact('program','kejuruan','sub_kejuruan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $program = tb_m_program::where('id');
        $kejuruan = tb_m_kejuruan::all();
        $sub_kejuruan = tb_m_sub_kejuruan::all();
        return view('program.create',compact('program','kejuruan','sub_kejuruan'));
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
        $this->validate($request,['kd_program'=>'required|unique:tb_m_programs']);
        $sub_kejuruan = tb_m_sub_kejuruan::all();
        $kejuruan = tb_m_kejuruan::all();
        $program = new tb_m_program;
        $program->kd_program = $request->kd_program;
        $program->nama_program = $request->nama_program;
        $program->kd_kejuruan = $request->kd_kejuruan;
        $program->kd_sub_kejuruan = $request->kd_sub_kejuruan;
        $program->jumlah_paket = $request->jumlah_paket;
        $program->lama_pelatihan = $request->lama_pelatihan;
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $program"
            ]);
        $program->save();
        return redirect()->route('program.index');
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
        $sub_kejuruan = tb_m_sub_kejuruan::all();
        $kejuruan = tb_m_kejuruan::all();
        $program = tb_m_program::findOrFail($id);
        return view('program.edit',compact('program','kejuruan','sub_kejuruan'));
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
        $sub_kejuruan = tb_m_sub_kejuruan::all();
        $kejuruan = tb_m_kejuruan::all();
        $program = tb_m_program::findOrFail($id);
        $program->kd_program = $request->kd_program;
        $program->nama_program = $request->nama_program;
        $program->kd_kejuruan = $request->kd_kejuruan;
        $program->kd_sub_kejuruan = $request->kd_sub_kejuruan;
        $program->jumlah_paket = $request->jumlah_paket;
        $program->lama_pelatihan = $request->lama_pelatihan;
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $program"
            ]);
        $program->save();
        return redirect()->route('program.index');
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
        $sub_kejuruan = tb_m_sub_kejuruan::all();
        $kejuruan = tb_m_kejuruan::all();
        tb_m_program::destroy($ids);
        $program->delete();
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Data program berhasil dihapus"
            ]);
        return redirect()->route('program.index');
    }
    public function search(Request $request)
    {
        $carim = $request->get('search');
        $program = tb_m_program::where('kd_program','LIKE','%'.$carim.'%')->paginate(10);
        return view('program.index',compact('program'));
    }
}
