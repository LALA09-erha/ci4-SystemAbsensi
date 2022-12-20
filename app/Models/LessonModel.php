<?php

namespace App\Models;

use CodeIgniter\Model;

class LessonModel extends Model
{
    protected $table      = 'pelajaran';
    protected $primaryKey = 'IDPELAJARAN';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['IDUSER', 'NAMAPELAJARAN'];
}