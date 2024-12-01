<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfileModel;
use Exception;

class ProfileController extends BaseController
{
    public function index()
    {
        $model = new ProfileModel();
        $names = explode(",", $this->request->getVar('name'));
        foreach ($names as $name) {
            $check = $model->where('name', $name)->first();
            if (empty($check)) {
                $response = [
                    'status' => 0,
                    'message' => 'nama tidak ditemukan',
                ];
                return $this->response->setStatusCode(400)->setJSON($response);
            }
        }
        $data = $model->whereIn('name', $names)->findAll();

        if (count($data) > 0) {
            return $this->response->setStatusCode(201)->setJSON([
                'status' => 1,
                'message' => 'tampil data berhasil',
                'data' => $data
            ]);
        } else {
            $response = [
                'status' => 0,
                'message' => 'nama tidak ditemukan',
            ];
            return $this->response->setStatusCode(400)->setJSON($response);
        }
    }

    public function entry()
    {
        $this->request = request();
        $rules = [
            'name' => ['rules' => 'required|min_length[1]|max_length[50]'],
            'gender' => ['rules' => 'required|max_length[1]'],
            'address'  => ['rules' => 'required']
        ];

        if ($this->validate($rules)) {
            $model = new ProfileModel();
            $data = [
                'name' => $this->request->getVar('name'),
                'gender' => $this->request->getVar('gender'),
                'address' =>  $this->request->getVar('address')
            ];
            $model->save($data);

            return $this->response->setStatusCode(201)->setJSON([
                'status' => 1,
                'message' => 'simpan data berhasil',
            ]);
        } else {
            $response = [
                'status' => 0,
                'message' => 'simpan data gagal',
                'data' => $this->request->getVar('data')->name
            ];
            return $this->response->setStatusCode(400)->setJSON($response);
        }
    }

    public function update()
    {
        $this->request = request();
        $rules = [
            'name' => ['rules' => 'required|min_length[1]|max_length[50]'],
            'gender' => ['rules' => 'required|max_length[1]'],
            'address'  => ['rules' => 'required']
        ];

        if ($this->validate($rules)) {
            $model = new ProfileModel();
            $data = [
                'id' => $this->request->getVar('id'),
                'name' => $this->request->getVar('name'),
                'gender' => $this->request->getVar('gender'),
                'address' => $this->request->getVar('address'),
            ];
            $model->save($data);

            return $this->response->setStatusCode(200)->setJSON([
                'status' => 1,
                'message' => 'ubah data berhasil',
            ]);
        } else {
            $response = [
                'status' => 0,
                'message' => 'ubah data gagal',
            ];
            return $this->response->setStatusCode(400)->setJSON($response);
        }
    }

    public function delete()
    {
        try {
            $this->request = request();
            $model = new ProfileModel();
            $id =  $this->request->getVar('name');
            $model->where('name', $id)->delete();

            return $this->response->setStatusCode(200)->setJSON([
                'status' => 1,
                'message' => 'hapus data berhasil',
            ]);
        } catch (Exception $ex) {
            $response = [
                'status' => 0,
                'message' => 'hapus data gagal',
            ];
            return $this->response->setStatusCode(400)->setJSON($response);
        }
    }
}
