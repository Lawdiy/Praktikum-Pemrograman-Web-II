<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        $data = [];
        helper(['form']);

        if (strtolower($this->request->getMethod()) === 'post') {
            $rules = [
                'email'    => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email harus diisi',
                        'valid_email' => 'Format email tidak valid'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'required' => 'Password harus diisi',
                        'min_length' => 'Password minimal 8 karakter'
                    ]
                ],
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))->first();

                if (!$user || !password_verify($this->request->getVar('password'), $user['password'])) {
                    session()->setFlashdata('error', 'Email atau Password salah!');
                    return redirect()->to('/login');
                }

                $this->setUserSession($user);
                return redirect()->to('/buku');
            }
        }

        echo view('templates/header', $data);
        echo view('login', $data);
        echo view('templates/footer');
    }

    private function setUserSession($user)
    {
        $data = [
            'id'         => $user['id'],
            'username'   => $user['username'],
            'email'      => $user['email'],
            'isLoggedIn' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
