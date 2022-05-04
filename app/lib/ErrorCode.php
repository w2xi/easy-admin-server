<?php


namespace app\lib;


class ErrorCode
{
    private static $code2Msg = [

    ];

    public static function getErrorMsg($code): string
    {
        if (array_key_exists($code, self::$code2Msg)) {
            return self::$code2Msg[$code];
        }
        return '';
    }
}