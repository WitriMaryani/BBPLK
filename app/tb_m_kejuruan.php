<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_kejuruan extends Model
{
    //
    protected $table = 'tb_m_kejuruans';
    protected $fillable = ['kd_kejuruan','nama_kejuruan','keterangan'];
    protected $visible = ['kd_kejuruan','nama_kejuruan','keterangan'];
    public $timestamps = true;

    public function sub_kejuruan()
    {
    	return $this->hasMany('App\tb_m_sub_kejuruan','kd_kejuruan');
    }
    public function program()
    {
    	return $this->hasMany('App\tb_m_program','kd_kejuruan');
    }
}
