<?php


namespace app\middleware;


use app\admin\model\UserModel;
use app\lib\exception\AuthException;
use app\lib\exception\BadRequestException;
use app\utils\JWT;
use think\Request;

class Auth
{
    public function handle(Request $request, \Closure $next)
    {
        $token = $request->header('token');
        if (!$token) {
            throw new BadRequestException('Token is required');
        }
        $jwt = JWT::instance();
        $jwt->setToken($token)->verify();
        $user = UserModel::find($jwt->getUid());

        if (!$user) {
            throw new AuthException('No permission');
        }
        $request->userId = $jwt->getUid();

        return $next($request);
    }
}