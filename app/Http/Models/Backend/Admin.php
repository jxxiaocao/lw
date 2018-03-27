<?php

namespace App\Http\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected  $table = 'admin';
    public $timestamps = false;
        //指定别的主键 ，默认的主键是：id，
    //protected $primaryKey = 'id';
    
    public function getAdminByNameP($name,$pass){
        $_where['username'] = $name;
        return $this->where($_where)->get()->toArray();
    }
    
}
