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
        $query = $db->query('SELECT * FROM absen,siswa,pelajaran,user WHERE absen.IDUSER = user.IDUSER AND absen.IDSISWA = siswa.IDSISWA AND absen.IDPELAJARAN = pelajaran.IDPELAJARAN AND user.IDUSER =' . session()->get('id'));
        $result = $query->getResultArray();

        $id = ((session()->get('id') + 2001) * 9) - 11;
        
        if (isset($_SESSION['id']) && $_SESSION['role'] == 'user') {

            $data = [
                'title' => 'Absent Data',
                'page' => 'absent',
                'absent' => $result,
                'data' => $id,
            ];
            return view('pages/absent', $data);
        } else if (isset($_SESSION['id']) && $_SESSION['role'] == 'admin') {

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