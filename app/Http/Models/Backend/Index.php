<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{

    public function getInfo(){
        $ret = 111;
        return $ret;
    }
    
    public function getInfoId(){
        $ret = 222;
        return $ret;
    }
    
}
