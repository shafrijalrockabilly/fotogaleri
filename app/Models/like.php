<?php

namespace App\Models;

use CodeIgniter\Model;

class like extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'like_foto';
    protected $primaryKey       = 'like_id';
    protected $returnType       = 'object';
    protected $protectFields    = false;
    protected $allowedFields    = [];
}

?>