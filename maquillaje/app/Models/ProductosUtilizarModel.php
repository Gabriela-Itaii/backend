<?php namespace App\Models;

use CodeIgniter\Model;

class ProductosUtilizarModel extends Model 
{
    protected $table            = 'productosUtilizar';
    protected $primaryKey       = 'id_productos';

    protected $returnType       = 'array';
    protected $allowedFields    = ['correctores', 'delineadores', 'rimel','labiales'];

    protected $validationRules  = [
        'correctores'           => 'required|min_length[1]|max_length[255]',
        'delineadores'          => 'required|min_length[1]|max_length[255]',
        'rimel'                 => 'required|min_length[1]|max_length[255]',
        'labiales'              => 'required|min_length[1]|max_length[255]',
    ];

    protected $validationMessages = [ 

    ];
 
    protected $skypValidation = false;
}