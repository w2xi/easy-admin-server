<?php


namespace app\lib\exception;


class BadRequestException extends BaseException
{
    public $statusCode = 400;
    public $msg = 'bad request';
    public $errorCode = 1000;
}