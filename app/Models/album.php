<?php

namespace App\Models;

use CodeIgniter\Model;

class album extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'album';
    protected $primaryKey       = 'album_id';
    protected $returnType       = 'object';
    protected $protectFields    = false;
    protected $allowedFields    = [];
}

?>