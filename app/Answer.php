<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;
class Answer extends Model
{
    //table name
    protected $table='answer';
    //primary key
    public $primarykey = 'Ans_id';
    //time stamp
    public $timestamp = true;

    protected $fillable = [
        'Ans_body','Ans_user_id'
    ];
    public function post()
    {
        return $this->belongsTo('App\post');
    }
}
