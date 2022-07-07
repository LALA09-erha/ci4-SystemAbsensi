<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\UserModel;
use App\Models\LessonModel;
use App\Models\AbsentModel;

class AdminController extends BaseController
{
    #IF ROLE IS ADMIN REDIRECT TO ADMIN PAGE / USER PAGE
    public function index()
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

    public function edituser()
    {
        //
    }
    public function prosesedit()
    {
        //
    }
    public function deleteuser()
    {
        //
    }
}