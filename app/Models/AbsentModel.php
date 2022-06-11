<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsentModel extends Model
{
    protected $table      = 'absen';
    protected $primaryKey = 'idAbsen';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['kodeUser', 'kodeSiswa', 'kodematkul', 'tanggal'];
}