<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webuser_student extends Model
{
    protected $table = 'webuser_student';
    public $timestamps = true;
    protected $fillable = array('webuser_id', 's_stnya', 's_booking_time', 's_booking', 's_primary', 's_second', 's_minor', 's_v', 's_i', 's_r', 's_t', 's_u', 's_e', 's_s', 's_user', 's_waktu', 's_pesan', 's_test_mulai', 's_test_selesai');

    public function webuser_id()
    {
        return $this->belongsTo('App\Webuser', 'webuser_id');
    }
    public function kd_virtues_s_primary()
    {
        return $this->belongsTo('App\Kd_virtues', 's_primary');
    }
    public function kd_virtues_s_second()
    {
        return $this->belongsTo('App\Kd_virtues', 's_second');
    }
    public function kd_virtues_s_minor()
    {
        return $this->belongsTo('App\Kd_virtues', 's_minor');
    }
}
