<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';

    protected $fillable = [
        'nameBrand', 'status', 'notes'
    ];

    public function products(){
        return $this->hasMany('App\Model\Posts', 'brand_id');
    }


}
