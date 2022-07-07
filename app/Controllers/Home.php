<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\UserModel;
use App\Models\LessonModel;
use App\Models\AbsentModel;

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
}