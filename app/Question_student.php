<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question_student extends Model
{
    protected $table = 'question_student';
    public $timestamps = true;
    protected $fillable = array('kd_virtues_id', 'tanya1', 'tanya2', 'tanya3', 'tanya4', 'tanya5', 'tanya6', 'tanya7', 'tanya8', 'tanya9', 'tanya10', 'tanya11', 'tanya12');

    public function kd_virtues()
    {
        return $this->belongsTo('App\Kd_virtues');
    }
}
