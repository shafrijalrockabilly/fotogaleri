<?php

namespace App\Models;

use CodeIgniter\Model;

class user extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'user_id';
    protected $returnType       = 'object';
    protected $protectFields    = false;
    protected $allowedFields    = [];
}

?>