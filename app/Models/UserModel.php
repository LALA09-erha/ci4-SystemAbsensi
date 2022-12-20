<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'IDUSER';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['ROLE', 'USERNAME', 'EMAIL', 'PASSWORD'];
}