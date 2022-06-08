<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'idUser';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['role', 'username', 'email', 'password'];
}