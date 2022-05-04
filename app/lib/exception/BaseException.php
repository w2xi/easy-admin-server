<?php

namespace app\lib\exception;

use Exception;

class BaseException extends Exception
{
    public $statusCode = 400;
    public $msg = 'unknown error';
    public $errorCode = 999;

    public function __construct($params = null)
    {
        if ( is_string($params) ){
            $this->msg = $params;
            return;
        }
        if ( !is_array($params) ){
            return;
        }
        if ( array_key_exists('statusCode', $params) ){
            $this->statusCode = $params['statusCode'];
        }
        if ( array_key_exists('msg', $params) ){
            $this->msg = $params['msg'];
        }
        if ( array_key_exists('errorCode', $params) ){
            $this->errorCode = $params['errorCode'];
        }
    }
}