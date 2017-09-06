<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_sub_kejuruan extends Model
{
    //
    protected $table = 'tb_m_sub_kejuruans';
    protected $fillable = ['kd_sub_kejuruan','nama_sub_kejuruan','kd_kejuruan','keterangan'];
    protected $visible = ['kd_sub_kejuruan','nama_sub_kejuruan','kd_kejuruan','keterangan'];
    public $timestamps = true;

    public function program()
    {
    	return $this->hasMany('App\tb_m_program','kd_sub_kejuruan');
    }
}
