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
    protected $validationRules  =[
        'nombre'    => 'required|alpha_space|min_length[3]|max_length[75]',
        'apellido'  => 'required|alpha_space|min_length[3]|max_length[75]',
        'profesion' => 'required|alpha_space|min_length[2]|max_length[3]',
        'telefono'  => 'required|alpha_numeric_space|min_length[8]|max_length[9]',
        'dui'       => 'required|regex_match[^\\d{8}-\\d$]',
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

        'profesion' => [
            'alpha_space' => 'Solo se permiten letras EJ: Arq, Dr, Ing',
            'required'    => 'Este campo no puede ir vacio',
            'min_length'    => 'El minimo de numeros es 3',
            'max_length'    => 'El maximo de numeros es 3',
        ],

        'telefono' => [
            'alpha_numeric_space' => 'Solo se permiten numeros',
            'required'    => 'Este campo no puede ir vacio',
            'min_length'    => 'El minimo de numeros es 8',
            'max_length'    => 'El maximo de numeros es 9',
        ],

        'dui' => [
            'regex_match' => 'El formato es 00000000-0',
            'required'    => 'Este campo no puede ir vacio',
        ],


    ];

    //para no saltarse ninguna validacion
    protected $skipValidation = false;
}