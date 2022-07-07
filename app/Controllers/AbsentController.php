<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\UserModel;
use App\Models\LessonModel;
use App\Models\AbsentModel;

class AbsentController extends BaseController
{
    #IF ROLE IS ADMIN REDIRECT TO ADMIN PAGE / USER PAGE
    public function index()
    {
        $db      = \Config\Database::connect();
        $query = $db->query('SELECT * FROM absen,mahasiswa,matakuliah,users WHERE absen.kodeUser = users.idUser AND absen.kodeSiswa = mahasiswa.NIM AND absen.kodeMatkul = matakuliah.idMatkul AND users.idUser =' . session()->get('id'));
        $result = $query->getResultArray();

        $id = ((session()->get('id') + 2001) * 9) - 11;
        if (session()->get('id') && session()->get('role') == 'user') {

            $data = [
                'title' => 'Absent Data',
                'page' => 'absent',
                'absent' => $result,
                'data' => $id,
            ];
            return view('pages/absent', $data);
        } else if (session()->get('id') && session()->get('role') == 'admin') {

            $data = [
                'title' => 'Absent Data',
                'page' => 'absent',
                'absent' => $result,
                'data' => $id,
            ];
            return view('pages/absent', $data);
        } else {
            session()->setFlashdata('message', 'Login First');
            return redirect()->to('/login');
        }
    }

    public function deleteabsent()
    {
        //
    }
}