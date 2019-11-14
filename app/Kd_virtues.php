<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kd_virtues extends Model
{
    protected $table = 'kd_virtues';
    public $timestamps = true;
    protected $fillable = array('kd_virtues_nm', 'keterangan', 'icon');

    public function webuser_s_primary()
    {
        return $this->hasMany('App\Webuser_student', 's_primary');
    }
    public function webuser_s_second()
    {
        return $this->hasMany('App\Webuser_student', 's_second');
    }
    public function webuser_s_minor()
    {
        return $this->hasMany('App\Webuser_student', 's_minor');
    }
}
