<?php

namespace App\Models;

use CodeIgniter\Model;

class LessonModel extends Model
{
    protected $table      = 'matakuliah';
    protected $primaryKey = 'idMatkul';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['kodeUser', 'namaMatkul'];
}