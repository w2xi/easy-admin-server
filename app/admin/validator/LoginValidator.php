<?php


namespace app\admin\validator;


use app\lib\BaseValidator;

class LoginValidator extends BaseValidator
{
    protected $rule = [
        'username'  =>  'require|isNotEmpty',
        'password'  =>  'require|isNotEmpty',
    ];

    protected $scene = [
        'login'     =>  [ 'username', 'password' ],
        'update'    =>  [ 'username', 'password' ],
        'save'      =>  [ 'username', 'password' ],
    ];
}