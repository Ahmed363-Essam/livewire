<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\category;


class product extends Model
{
    //
    protected $fillable = ['title','body','cat_id','user_id','image'];

    public function category()
    {
        return $this->belongsTo('App\Model\category','cat_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }


}
