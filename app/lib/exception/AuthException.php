<?php


namespace app\lib\exception;


class AuthException extends BaseException
{
    public $statusCode = 401;
    public $msg = 'Unauthorized';
    public $errorCode = 1001;
}