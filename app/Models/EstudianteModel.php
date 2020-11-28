<?php namespace App\Models;

use CodeIgniter\Model;

class EstudianteModel extends Model{
    protected $table       = 'estudiante';
    protected $primaryKey  = 'id';

    protected $returnType       = 'array';
    protected $allowedFields    = ['nombre', 'apellido', 'dui', 'genero', 'carnet','grado_id'];

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    //Validaciones del modelo(Tabla)
    protected $validationRules  =[
        'nombre'    => 'required|alpha_space|min_length[3]|max_length[75]',
        'apellido'  => 'required|alpha_space|min_length[3]|max_length[75]',
        'dui'       => 'required|regex_match[^\\d{8}-\\d$]',
        'genero'    => 'required|regex_match[M|F|m|f]',
        'carnet'    => 'required|regex_match[^\\u|U\\d{8}$]',
        'grado_id'  => 'required|integer|is_valid_grado',
        
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
            'regex_match' => 'El formato es 00000000-0',
        ],

        'genero' => [
            'required'    => 'Este campo no puede ir vacio',
            'regex_match' => 'Solo se permite M o F',
        ],

        'carnet' => [
            'required'    => 'Este campo no puede ir vacio',
            'regex_match' => 'El formato es u20200000',
        ],


    ];

    //para no saltarse ninguna validacion
    protected $skipValidation = false;

}
