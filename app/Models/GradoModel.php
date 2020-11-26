<?php namespace App\Models;

use CodeIgniter\Model;

class GradoModel extends Models{
    protected $table       = 'grado';
    protected $primaryKey  = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['grado', 'seccion', 'profesor'];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    //Validaciones del modelo(Tabla)
    protected $validationRules  =[
        'grado' => 'required | alpha_space| min_length[5]| max_length[60] ',
        'seccion' => 'required | alpha_space| min_length[1]| max_length[2] '
        
    ];
    //mensajes predeterminados de CodeIgniter a usuarios
    protected $validationMessages  = [
        'grado' => [
            'alpha_space' => 'No se permiten numeros'
            ]
    ];

    //para no saltarse ninguna validacion
    protected $skipValidation = false;


}