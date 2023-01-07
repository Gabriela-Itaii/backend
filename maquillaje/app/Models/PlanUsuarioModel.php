<?php namespace App\Models;

use CodeIgniter\Model;

class PlanUsuarioModel extends Model 
{
    protected $table            = 'planUsuario';
    protected $primaryKey       = 'id_plan_usuario';

    protected $returnType       = 'array';
    protected $allowedFields    = ['tipo_de_piel', 'complexion', 'id_produc','id_paque'];

    protected $validationRules  = [
        'tipo_de_piel'           => 'required|min_length[1]|max_length[255]',
        'id_produc'              => 'required|numeric|min_length[1]|max_length[8]',
        'id_paque'               => 'required|numeric|min_length[1]|max_length[8]',
    ];

    protected $validationMessages = [ 

    ];
 
    protected $skypValidation = false;
}