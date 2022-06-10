<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\UserModel;

class Home extends BaseController
{
    #IF SUCCESS LOGIN REDIRECT TO HOME PAGE
    public function index()
    {
        if (session()->get('id')) {
            $mahasiswa = new StudentModel();
            $data = [
                'title' => 'Student Data',
                'mahasiswa' => $mahasiswa->findAll(),
                'page' => 'student',
            ];

            return view('pages/index', $data);
        } else {
            session()->setFlashdata('message', 'Login First');
            return redirect()->to('/login');
        }
    }

    #IF ROLE IS ADMIN REDIRECT TO ADMIN PAGE / USER PAGE
    public function admin()
    {
        if (session()->get('role') == 'admin') {
            $user = new UserModel();
            $data = [
                'title' => 'User Data',
                'user' => $user->findAll(),
                'page' => 'user',
            ];

            return view('pages/user', $data);
        } else {
            session()->setFlashdata('message', 'Login First');
            return redirect()->to('/login');
        }
    }
}