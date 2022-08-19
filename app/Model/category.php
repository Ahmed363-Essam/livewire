<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use App\Model\product;

class category extends Model
{
    //

    protected $fillable = ['title','description'];

    public function product()
    {
        return $this->hasMany('App/Model/product','cat_id');
    }
}
