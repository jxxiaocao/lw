<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    
    public function __construct() {
        
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
