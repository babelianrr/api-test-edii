<?php

namespace App\Controllers;
  
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;
use App\Helpers\TokenHelper;

class LoginController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $userModel = new UserModel();
        $tokenHelper = new TokenHelper();
   
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
           
        $user = $userModel->where('username', $username)->first();
   
        if(is_null($user)) {
            return $this->respond([
                'status' => 0,
                'error' => 'login gagal harap periksa username kembali.',
            ], 401);
        }
   
        $pwd_verify = password_verify($password, $user['password']);
   
        if(!$pwd_verify) {
            return $this->respond([
                'error' => 'login gagal harap periksa username kembali.'
            ], 401);
        }

        $payload = array(
            "username" => $user['username'],
            "password" => $user['password']
        );
          
        $token = $tokenHelper->generate_token($payload['username'], $payload['password']);
  
        $response = [
            'status' => 1,
            'message' => 'Login berhasil',
            'token' => $token
        ];
          
        return $this->respond($response, 200);
    }
}
