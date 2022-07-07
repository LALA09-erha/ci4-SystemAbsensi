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

    public function prosesedit()
    {
        $id       = intval($this->request->getPost('iduser'));
        $classname = $this->request->getPost('nama');
        $class = new LessonModel();
        // check if class already exist
        $check = $class->where('namaMatkul', $classname)->where('kodeUser', $id)->findAll();
        if (count($check) > 0) {
            if ($check[0]['namaMatkul'] == $this->request->getpost('nama') && $check[0]['kodeUser'] == $this->request->getpost('iduser')) {
                session()->setFlashdata('message', 'Class No Changed');
                return redirect()->to('/class');
            } else {
                session()->setFlashdata('message', 'Class already exist');
                return redirect()->to('/class');
            }
        } else {
            // update class
            $data = [
                'namaMatkul' => $classname,
            ];
            $class->where('idMatkul', $id)->update($data);
            session()->setFlashdata('message', 'Class updated');
            return redirect()->to('/class');
        }
    }

    public function delete($id)
    {
        if (session()->get('id')) {
            $class = new LessonModel();
            // get class data by id
            $classes = $class->where('idMatkul', $id)->findAll();
            if ($classes[0]['kodeUser'] == session()->get('id') || session()->get('role') == 'admin') {
                $class->where('idMatkul', $id)->delete();
                session()->setFlashdata('message', 'Class deleted');
                return redirect()->to('/class');
            }
        } else {
            session()->setFlashdata('message', 'Login First');
            return redirect()->to('/login');
        }
    }
}