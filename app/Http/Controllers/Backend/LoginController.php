<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Models\Backend\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;  

class LoginController extends CommonController
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
    
    /**
     * 登录
     * @param Request $request
     * @return type
     */
    public function login(Request $request) {
        if ($request->isMethod('post')) {
            $name = trim(Input::post('username'));
            $res = Admin::where('username', '=', $name)->get()->toArray();
            if(!$res || empty($res)){
               return $this->json_return(0, 'error','error');
            }
            $data_user = ['MyUid'=>1,'UserNmae'=>$res[0]['username']];
            Session::push('MyUser',json_encode($data_user));
            $data = env('APP_URL').'backend/index';
            return $this->json_return(200,'ok',$data);
        }
        return view('Backend.Login.login', ['urls' => url()->full()]);
    }

}
