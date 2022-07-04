<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\UserModel;
use App\Models\LessonModel;
use App\Models\AbsentModel;

class ClassController extends BaseController
{
    public function index()
    {
        if (session()->get('id')) {
            $class = new LessonModel();
            $data = [
                'title' => 'Class Data',
                'page' => 'class',
                'class' => $class->findAll(),
            ];
            return view('pages/class', $data);
        } else {
            session()->setFlashdata('message', 'Login First');
            return redirect()->to('/login');
        }
    }

    public function addclass()
    {
        if (session()->get('id')) {
            $class = new LessonModel();
            $data = [
                'title' => 'Add Class',
                'page' => 'addclass',
                'class' => $class->findAll(),
            ];
            return view('action/addclass', $data);
        } else {
            session()->setFlashdata('message', 'Login First');
            return redirect()->to('/login');
        }
    }

    public function prosesadd()
    {
        $id       = intval($this->request->getPost('iduser'));
        $classname = $this->request->getPost('nama');
        $class = new LessonModel();
        // check if class already exist
        $check = $class->where('namaMatkul', $classname)->where('kodeUser', $id)->findAll();
        if (count($check) > 0) {
            session()->setFlashdata('message', 'Class already exist');
            return redirect()->to('/addclass');
        } else {
            // insert class
            $data = [
                'kodeUser'   => $id,
                'namaMatkul' => $classname,
            ];
            $class->insert($data);
            session()->setFlashdata('message', 'Class added');
            return redirect()->to('/class');
        }
    }

    public function editclass($id)
    {
        if (session()->get('id')) {
            $class = new LessonModel();
            // get class data by id
            $data = [
                'title' => 'Edit Class',
                'page' => 'editclass',
                'class' => $class->where('idMatkul', $id)->findAll(),
            ];
            return view('action/editclass', $data);
        } else {
            session()->setFlashdata('message', 'Login First');
            return redirect()->to('/login');
        }
    }
}