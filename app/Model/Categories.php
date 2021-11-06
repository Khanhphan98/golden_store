<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'nameCategory', 'path', 'parentId', 'status'
    ];

    public function products () {
        return  $this->hasMany('App\Model\Products', 'category_id');
    }

    public function scopeOrderByPath($query){
        return $query->orderBy('path', 'asc');
    }

    public function scopeCheckParentID($query, $id){
        return $query->where('parentId', $id);
    }
}
