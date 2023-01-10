<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Models\UserModel;
use App\Models\LessonModel;
use App\Models\AbsentModel;

class StudentController extends BaseController
{
    #IF SUCCESS LOGIN REDIRECT TO HOME PAGE
    public function index()
    {
        // dd(session()->get('id'));
        if (session()->get('id') != null) {
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

    //add student
    public function addstudent(){
        // dd(session()->get('role'));
        if (session()->get('role') == 'user') {
            $user = new UserModel();
            $data = [
                'title' => 'Add Data',
                'user' => $user->findAll(), 
                'page' => 'user',
            ];

            return view('action/addstudent', $data);
        } else {
            session()->setFlashdata('message', 'Login First');
            return redirect()->to('/login');
        }
    }


    //proses student add
    public function prosesaddstudent()
    {
        $db      = \Config\Database::connect();
        $nim = $this->request->getpost('nim');
        $nama = $this->request->getpost('nama');
        // check nim if exits or not
        $check = $db->query('select * from siswa where IDSISWA='.$nim.' AND IDUSER='.session()->get('id'));
        $result = $check->getResultArray();
        if (count($result) > 0) {
            session()->setFlashdata('message', 'NIM already exits');
            return redirect()->to('/addstudent');
        }else{
            // dd($nim, $nama);
            $data = [
                'IDSISWA' => $nim,
                'IDUSER' => session()->get('id'),
                'NAMASISWA' => $nama
            ];
            $db->table('siswa')->insert($data);

            session()->setFlashdata('message','DATA SAVED');
            return redirect()->to('/');
        }
        

    }
  
    //edit student
    public function editstudent($user,$siswa){
        if($user == session()->get('id')){
            $db      = \Config\Database::connect();
            $check = $db->query('select * from siswa where IDSISWA='.$siswa.' AND IDUSER='.session()->get('id'));
            $result = $check->getResultArray();
            if (count($result) > 0) {
                $data = [
                    'title' => 'Edit Data',
                    'siswa' => $result,
                    'page' => 'user',
                ];
                // dd($result[0]['IDSISWA']);
                return view('action/editstudent', $data);
            }else{
                session()->setFlashdata('message','DATA NOT FOUND');
                return redirect()->to('/');
            }
        }else{
            session()->setFlashdata('message','DATA NOT FOUND');
            return redirect()->to('/');
        }
    }

    //proses edit student
    public function proseseditstudent(){
        $db      = \Config\Database::connect();
        $cari_nama = $db->query('SELECT * FROM siswa WHERE IDSISWA='.$this->request->getpost('nim').' AND IDUSER='.session()->get('id'));
        $result = $cari_nama->getResultArray();
        if($result[0]['NAMASISWA'] == $this->request->getpost('nama')){
            session()->setFlashdata('message',"DATA NOT CHANGED");
            return redirect()->to('/');
        }else{
            $db->table('siswa')->update(['NAMASISWA' => $this->request->getpost('nama')], ['IDSISWA' => $this->request->getpost('nim'), 'IDUSER' => session()->get('id')]);
            session()->setFlashdata('message','DATA CHANGED');
            return redirect()->to('/');
        }
    }

    ///delete student
    public function deletestudent($user,$siswa)
    {
        if($user == session()->get('id')){
            $db      = \Config\Database::connect();
            $db->table('siswa')->delete(['IDSISWA' => $siswa, 'IDUSER' => $user]);
            session()->setFlashdata('message','DATA DELETED');
            return redirect()->to('/');
        }else{
            session()->setFlashdata('message','DATA NOT FOUND');
            return redirect()->to('/');
        }
    }
}