<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\MyModel;

class Products extends MyModel
{
    protected $table = 'products';

    public function brands(){
        return $this->belongsTo('App\Model\Brand');
    }

    public function categories(){
        return $this->belongsTo('App\Model\Categories');
    }

    public function scopeFillterProduct($query){
        return $query->leftJoin('brands', 'products.brand_id', '=', 'brands.id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'brands.nameBrand', 'categories.nameCategory');
    }

}
