<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use App\Models\UserModel;

class RegisterController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $rules = [
            'username' => ['rules' => 'required|min_length[4]|max_length[255]|is_unique[users.username]'],
            'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
        ];
  
        if ($this->validate($rules)) {
            $model = new UserModel();
            $data = [
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
             
            return $this->respond(['message' => 'Registered Successfully'], 200);
        } else {
            $response = [
                'errors' => $this->validator->getErrors(),
                'message' => 'Invalid Inputs'
            ];
            return $this->fail($response , 409);
             
        }
    }
}
