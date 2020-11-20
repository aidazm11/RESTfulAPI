<?php namespace App\Models;

use CodeIgniter\Model;

class EstudianteModel extends Model{
    protected $table       = 'estudiante';
    protected $primaryKey  = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nombre', 'apellido', 'dui', 'genero', 'carnet'];

    protected $useTimeStamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    //Validaciones del modelo(Tabla)
    protected $validationRules  =[
        'nombre' => 'required | alpha_space| min_lenght[3]| max_lenght[75] ',
        'apellido' => 'required | alpha_space| min_lenght[3]| max_lenght[75] ',
        'dui' => 'required | numeric| min_lenght[9]| max_lenght[9] ',
        'genero' => 'required | min_lenght[1]| max_lenght[2] ',
        
    ];
    //mensajes predeterminados de CodeIgniter a usuarios
    protected $validationMessages  = [
        'nombre' => [
            'alpha_space' => 'No se permiten numeros'
            ]
    ];

    //para no saltarse ninguna validacion
    protected $skipValidation = false;

}
