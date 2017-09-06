<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_program extends Model
{
    //
    protected $table = 'tb_m_programs';
    protected $fillable = ['kd_program','kd_sub_kejuruan','kd_kejuruan','nama_program','jumlah_paket','lama_pelatihan'];
    protected $visible = ['kd_program','kd_sub_kejuruan','kd_kejuruan','nama_program','jumlah_paket','lama_pelatihan'];
    public $timestamps = true;

    public function kejuruan()
    {
    	return $this->belongsTo('App\tb_m_kejuruan','kd_kejuruan');
    }
    public function sub_kejuruan()
    {
    	return $this->belongsTo('App\tb_m_sub_kejuruan','kd_sub_kejuruan');
    }
}
