<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class post extends Model
{
    //table name
    protected $table='posts';
    //primary key
    public $primarykey = 'Q_id';
    //time stamp
    public $timestamp = true;

    protected $fillable = [
        'Q_body','ask_user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function answer()
    {
        return $this->hasMeny('App\Answer');
    }
}
