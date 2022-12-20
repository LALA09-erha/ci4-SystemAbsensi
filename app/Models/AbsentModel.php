<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsentModel extends Model
{
    protected $table      = 'absen';
    protected $primaryKey = 'IDABSEN';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['IDUSER', 'IDSISWA', 'IDPELAJARAN', 'TANGGAL'];
}