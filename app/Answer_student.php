<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer_student extends Model
{
    protected $table = 'answer_student';
    public $timestamps = true;
    protected $fillable = array('webuser_id', 'soal', 'jawaban');

    public function webuser()
    {
        return $this->belongsTo('App\Webuser');
    }
}
