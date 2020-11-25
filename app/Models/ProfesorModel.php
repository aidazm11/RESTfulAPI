<?php namespace App\Models;

use CodeIgniter\Model;

class ProfesorModel extends Model{
    protected $table       = 'profesor';
    protected $primaryKey  = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nombre', 'apellido', 'profesion', 'telefono', 'dui'];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    //Validaciones del modelo(Tabla)
    protected $validationRule  =[
        'nombre'    => 'required|alpha_space|min_lenght[3]|max_lenght[75]',
        'apellido'  => 'required|alpha_space|min_lenght[3]|max_lenght[75]',
        'profesion' => 'required|alpha_space|min_lenght[2]|max_lenght[3]',
        'telefono'  => 'required|alpha_numeric_space|min_lenght[9]|max_lenght[9]',
        'dui'       => 'required|alpha_numeric_space|min_lenght[10]|max_lenght[10]',
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