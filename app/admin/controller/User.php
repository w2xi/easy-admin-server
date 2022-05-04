<?php


namespace app\admin\controller;


use app\admin\model\UserModel;
use app\admin\validator\LoginValidator;
use app\lib\exception\BadRequestException;
use app\utils\JWT;
use think\Request;
use think\response\Json;

class User
{
    public $errorMsg = '';

    public function login(Request $request): Json
    {
        (new LoginValidator())->goCheck();
        $username = $request->post('username');
        $password = $request->post('password');

        $user = (new UserModel())->where('username', $username)->find();

        if (!$user) {
            throw new BadRequestException('User not exist');
        }
        // verify password
        if (!$this->verifyPassword($password, $user)) {
            throw new BadRequestException($this->errorMsg);
        }

        $jwt = JWT::instance();
        $token = $jwt->setUid($user->id)->encode()->getToken();

        $data = [
            'token'     => $token,
            'userInfo'  => $user,
        ];

        return _success($data);
    }

    public function info(Request $request)
    {
        $userId = $request->userId;
        $user = UserModel::find($userId);

        return _success($user);
    }

    private function verifyPassword(string $password, UserModel $user): bool
    {
        $cryptoPassword = md5(md5($password) . $user->salt);

        if ($cryptoPassword !== $user->password) {
            $this->errorMsg = 'Invalid password';
            return false;
        }

        return true;
    }
}