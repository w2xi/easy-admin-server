<?php
// 应用公共文件


// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\response\Json;

if (!function_exists('_success')) {
    function _success($data = null, $msg = 'success'): Json
    {
        $result = [
            'code'  => 0,
            'msg'   => $msg,
            'data'  => $data,
        ];

        return json($result);
    }
}

if (!function_exists('_error')) {
    function _error($msg = 'error', $data = null): Json
    {
        $result = [
            'code'  => 10001,
            'msg'   => $msg,
            'data'  => $data,
        ];

        return json($result);
    }
}

if (!function_exists('genRandomChar')) {
    // generate random string of given length
    function genRandomChar($length = 6): string
    {
        $str = '';
        $chars = '123456789abcdefghjkmnpqrstuvwxyABCDEFGHJKLMNPQRSTUVWXY';

        for ($i = 0; $i < $length; $i++) {
            $str .= $chars[mt_rand(0, strlen($chars) - 1)];
        }

        return $str;
    }
}

