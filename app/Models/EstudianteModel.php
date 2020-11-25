<?php namespace App\Models;

use CodeIgniter\Model;

class EstudianteModel extends Model{
    protected $table       = 'estudiante';
    protected $primaryKey  = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nombre', 'apellido', 'dui', 'genero', 'carnet'];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    //Validaciones del modelo(Tabla)
    protected $validationRule  =[
        'nombre' => 'required | alpha_space| min_lenght[3]| max_lenght[75] ',
        'apellido' => 'required | alpha_space| min_lenght[3]| max_lenght[75] ',
        'dui' => 'required | alpha_numeric_space| min_lenght[9]| max_lenght[9] ',
        'genero' => 'required| alpha_space | min_lenght[1]| max_lenght[2] ',
        'carnet'=> 'required|min_lenght[9]|max_lenght[9]|regex_match[/^[U-u]?+[0-9]{8}$ ',
        
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
