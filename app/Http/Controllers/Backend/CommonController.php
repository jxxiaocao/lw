<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    
    public function __construct() {
//         if(Auth::check() == false){
//             echo 11;exit();
//         //   return Redirect::guest('login');
//        }
    }
    
    
    /**
     * json （可跨域）
     * @param type $code  返回状态码
     * @param type $msg   提示
     * @param type $data  内容[]
     * @param type $url   请求接口
     */
    public function jsonp_return($code, $data, $msg = '', $url = '',$type=false) {
       $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
        $url = $url ? $url : $origin;
        $arr = array('code' => $code, 'msg' => $origin, 'url' => $url, 'data' => $data);
        $header = header('Content-Type', 'post')->header('Access-Control-Allow-Origin','*')->header('Access-Control-Allow-Methods','POST');
        return response()->json($arr)->$header;
        exit();
    }
    
     /**
     * json （可跨域）
     * @param type $code  返回状态码
     * @param type $msg   提示
     * @param type $data  内容[]
     * @param type $url   请求接口
     */
    public function json_return($code,$msg = '',$data,$url = '',$type=false) {
        $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] : '';
        $url = $url ? $url : $origin;
        $arr = array('code' => $code, 'msg' => $msg, 'url' => $url, 'data' => $data);
        return response()->json($arr);
        exit();
    }
    
    /**
     * $url 跳转地址 如果 === 0 就刷新本页面 或者不做处理
     * @param $message  错误信息
     * @param int $time 时间
     * @param string
     */
    protected function larError($message, $time = 3000, $url = "")
    {
        $str = '<script>';
        if ($url || $url === 0) {
            $str .= 'parent.error("' . $message . '",' . $time . ',"' . $url . '");';
        } else {
            $str .= 'parent.error("' . $message . '",' . $time . ');';
        }
        $str .= '</script>';
        exit($str);
    }



    /**
     * 成功提示  $url 跳转地址  否则刷新本页面
     * @param $message  提示信息
     * @param int $time 时间
     * @param string
     */
    protected function larSuccess($message, $time = 3000, $url = " ")
    {
        $str = '<script>';
        if ($url) {
            $str .= 'parent.success("' . $message . '",' . $time . ',"' . $url . '");';
        } else {
            $str .= 'parent.success("' . $message . '",' . $time . ');';
        }
        $str .= '</script>';
        exit($str);
    }



    /**
     *   成功操作  如果$url有 一般应用于弹出层 并且关闭页面  否则刷新本页面
     * @param $message  提示信息
     * @param int $time 时间
     * @param string
     */
    protected function bmgSuccess($message, $time = 3000, $url = " ")
    {
        $str = '<script>';
        if ($url) {
            $str .= 'parent.bmgSuccess("' . $message . '",' . $time . ',"' . $url . '");';
        } else {
            $str .= 'parent.success("' . $message . '",' . $time . ',"' . $url . '");';
        }
        $str .= '</script>';
        exit($str);
    }



    /**
     * @param $message  提示信息
     * @param int $time 时间
     * @param string $url 跳转地址 如果 === 0 就刷新本页面 或者不做处理
     */
    protected function larMsg($message, $url = '', $time = 3000)
    {
        $str = '<script>';
        $str .= 'parent.bmsg("' . $message . '",' . $url . ',' . $time . ');';
        $str .= '</script>';
        exit($str);
    }



    /**
     * 判断字段数据是否为空
     * @param $arr
     * @return mixed
     */
    protected function IsEmpty($arr)
    {
        foreach($arr as $k=>$v)
        {
            if(empty($k))
            {
               return $v;
            }
        }
    }

}
