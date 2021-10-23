<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MyModel extends Model
{
    private $arrFunc = array();


    /**
     * Luu truc mang cond
     * @param type $function
     * @param type $arrVal
     */
    public function setFunctionCond($function, $arrVal){
        $this->arrFunc[] = ['function' => $function, 'arrVal' => $arrVal];
    }

    /**
     * Thuc hien tao cond
     * @return type
     */
    public function buildCond(){
        $data = $this;
        foreach($this->arrFunc as $item)
        {
            $data = call_user_func_array([$data, $item['function']], $item['arrVal']);
        }
        $this->arrFunc = [];
        return $data;
    }

}
