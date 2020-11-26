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
        'nombre' => 'required | alpha_space| min_length[3]| max_length[75] ',
        'apellido' => 'required | alpha_space| min_length[3]| max_length[75] ',
        'dui' => 'required | alpha_numeric_space| min_length[9]| max_length[9] ',
        'genero' => 'required',
        'carnet'=> 'required|min_length[9]|max_length[9]',
        
    ];
    //mensajes predeterminados de CodeIgniter a usuarios
    protected $validationMessages  = [
        'nombre' => [
            'alpha_space' => 'No se permiten numeros',
            'required'    => 'Este campo no puede ir vacio',
            'min_length'    => 'El minimo de letras es 3',
            'max_length'    => 'El maximo de letras es 75',
        ],

        'apellido' => [
            'alpha_space' => 'No se permiten numeros',
            'required'    => 'Este campo no puede ir vacio',
            'min_length'    => 'El minimo de letras es 3',
            'max_length'    => 'El maximo de letras es 75',
        ],

        'dui' => [
            'alpha_numeric_space' => 'Solo se permiten numeros',
            'required'    => 'Este campo no puede ir vacio',
            'min_length'    => 'El minimo de numeros es 9',
            'max_length'    => 'El maximo de numeros es 9',
        ],

        'genero' => [
            'required'    => 'Este campo no puede ir vacio',
        ],

        'carnet' => [
            'required'    => 'Este campo no puede ir vacio',
            'min_length'    => 'El minimo de numeros es 9',
            'max_length'    => 'El maximo de numeros es 9',
        ],


    ];

    //para no saltarse ninguna validacion
    protected $skipValidation = false;

}
