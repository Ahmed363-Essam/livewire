<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    //
    protected $fillable = ['title','message'];


    public function users()
    {
        return $this->belongsToMany('App\User','user_messages','user_id','message');
    }
}
