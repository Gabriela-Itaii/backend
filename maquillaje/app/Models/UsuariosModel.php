<?php namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model 
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id_usuario';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nombres', 'apellidos', 'edad','correo_electronico', 'id_plan'];

    protected $validationRules  = [
        'nombres'                    => 'required|min_length[1]|max_length[255]',
        'apellidos'                  => 'required|min_length[1]|max_length[255]',
        'edad'                       => 'required|min_length[1]|max_length[255]',
        'correo_electronico'         => 'required|min_length[1]|max_length[255]',
        'id_plan'                    => 'required|numeric|min_length[1]|max_length[255]',
    ];

    protected $validationMessages = [ 

    ];
 
    protected $skypValidation = false;
}