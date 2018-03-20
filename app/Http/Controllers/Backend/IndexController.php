<?php

namespace App\Http\Controllers\Backend;

use App\Http\Models\Backend\Index;


class IndexController extends CommonController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index(){
        return view('Backend.Index.index');
    }
    public function main(){
        return view('Backend.Index.main');
    }
}
