<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table      = 'mahasiswa';
    protected $primaryKey = 'NIM';
    protected $allowedFields = ['kodeUser', 'namaSiswa'];
}