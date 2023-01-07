<?php namespace App\Models;

use CodeIgniter\Model;

class PaqueteMakeupModel extends Model 
{
    protected $table            = 'paqueteMakeup';
    protected $primaryKey       = 'id_makeup';

    protected $returnType       = 'array';
    protected $allowedFields    = ['cejas', 'ojos', 'labios'];

    protected $validationRules  = [
        'cejas'                 => 'required|min_length[1]|max_length[255]',
        'ojos'                  => 'required|min_length[1]|max_length[255]',
        'labios'                => 'required|min_length[1]|max_length[255]',
    ];

    protected $validationMessages = [ 

    ];
 
    protected $skypValidation = false;
}