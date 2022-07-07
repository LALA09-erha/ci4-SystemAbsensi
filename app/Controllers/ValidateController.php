<?php

namespace App\Controllers;

use App\Models\UserModel;

class ValidateController extends BaseController

{

    // mengalihkan route ke halaman login
    public function index()
    {
        if (session()->get('id')) {
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Login',
        ];

        return view('pagesform/login', $data);
    }

    // memproses form login dan redirect to view index
    public function proseslogin()
    {
        $user = new UserModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $cekUser = $user->where('username', $username)->first();
        if ($cekUser) {
            if (password_verify($password, $cekUser['password'])) {
                $data = [
                    'id' => $cekUser['idUser'],
                    'username' => $cekUser['username'],
                    'role' => $cekUser['role'],
                ];
                session()->set($data);
                session()->setFlashdata('message', 'Login Success');
                return redirect()->to('/');
            } else {
                session()->setFlashdata('message', 'Login Failed');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('message', 'Login Failed');
            return redirect()->to('/login');
        }
    }

    // show view register form
    public function register()
    {
        if (session()->get('id')) {
            return redirect()->to('/');
        }
        $data = [
            'title' => 'Register',
        ];
        return view('pagesform/regist', $data);
    }

    // proses regist form dan redirect to view login
    public function prosesregist()
    {
        $role = $this->request->getPost('role');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $confirmpassword = $this->request->getPost('Cpassword');
        if ($password != $confirmpassword) {
            session()->setFlashdata('message', 'Password and Confirm Password not match');
            return redirect()->to('/regist');
        }
        $user = new UserModel();
        $cekUser = $user->where('username', $username)->orWhere('email', $email)->first();
        if ($cekUser) {
            session()->setFlashdata('message', 'Username or Email already exist');
            return redirect()->to('/regist');
        } else {
            $passwordhash = password_hash($password, PASSWORD_DEFAULT);
            $data = [
                'username' => $username,
                'password' => $passwordhash,
                'email' => $email,
                'role' => $role
            ];
            $user->insert($data);
            session()->setFlashdata('message', 'Success Register');
            return redirect()->to('/login');
        }
    }
    #IF USER LOGOUT REDIRECT TO LOGIN PAGE
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}