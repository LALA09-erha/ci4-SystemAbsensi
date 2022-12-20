<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table      = 'SISWA';
    protected $primaryKey = 'IDSISWA';
    protected $allowedFields = ['IDUSER', 'NAMASISWA'];
}