<?php namespace App\Models\CustomRules;

use App\Models\ProfesorModel;
use App\Models\GradoModel;

class MyCustomRules
{
    public function is_valid_profesor(int $id):bool
    {
        $model = new ProfesorModel();
        $profesor = $model->find($id);

       return $profesor == null ? false : true;
    }

    public function is_valid_grado(int $id):bool
    {
        $model = new GradoModel();
        $grado = $model->find($id);

       return $grado == null ? false : true;
    
    }
    
   /*public function is_allow_estudiante(int $id):bool
    {
        //los id pueden ser del 1 a 4 pero no mayor
       return $id > 4  ? false : true;
    
    }*/

}