<?php namespace App\Models;

use CodeIgniter\Model;

class GradoModel extends Model{
    protected $table       = 'grado';
    protected $primaryKey  = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['grado', 'seccion', 'profesor_id'];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    //Validaciones del modelo(Tabla)
    protected $validationRules  =[
        'grado'       => 'required|alpha_space|min_length[5]|max_length[60]',
        'seccion'     => 'required|alpha_space|min_length[1]|max_length[2]',
        'profesor_id' => 'required|integer|is_valid_profesor',
        
    ];
    //mensajes predeterminados de CodeIgniter a usuarios
    protected $validationMessages  = [
        'grado' => [
            'required' => 'No puede ir vacio',
            'alpha_space' => 'No se permiten numeros',
            'min_length' => 'El minimo de caracteres es 5',
            'max_length' => 'El maximo de caracteres es 60',
        ],

        'seccion' => [
            'required' => 'No puede ir vacio',
            'alpha_space' => 'No se permiten numeros',
            'min_length' => 'El minimo de caracteres es 1',
            'max_length' => 'El maximo de caracteres es 2',
        ],

        'profesor_id' => [
            'required' => 'No puede ir vacio',
        ],
    ];

    //para no saltarse ninguna validacion
    protected $skipValidation = false;


}