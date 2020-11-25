<?php namespace App\Controllers\API;

use App\Models\ProfesorModel;
use CodeIgniter\RESTful\ResourceController;
class Profesores extends ResourceController
{
	public function __construct(){
		$this ->model = $this->setModel(new ProfesorModel());
	}

	public function index()
	{
		$profesores = $this->model->findAll();
		return $this->respond($profesores);
		
	}

	public function create(){
		try {

			$profesor = $this->request->getJSON();
            if ($this->model->insert($profesor)):
                $profesor->id=$this->model->insertID();
				return $this->respondCreated($profesor);
			else:
				return $this->failValidationError($this->model->validation->listErrors());
			endif;
		} catch (\Exception $e) {
			return $this->failServerError('Ha ocurrido un error en el servidor');
		}
	}

	public function edit($id = null)
	{
		try {
			if ($id == null)
				return $this->failValidationError('No se ha pasado un ID valido');
			
			$profesor= $this->model->find($id);

				//validar que el ID no venga nulo
			if ($profesor == null)
				return $this->failNotFound('No se ha encontrado un cliente con el id: '.$id);

				return $this->respond($profesor);

		} catch (\Exception $e) {
			return $this->failServerError('Ha ocurrido un error en el servidor');
		}	
	}

	public function update($id = null)
	{
		try {
			if ($id==null)
				return $this->failValidationError('No se ha pasado un ID valido');
				$profesorVerificado= $this->model->find($id);

				//validar que el ID no venga nulo
			if ($profesorVerificado == null)
				return $this->failNotFound('No se ha encontrado un cliente con el id: '.$id);

				$profesor =$this-> request->getJSON();

			if ($this->model->update($id, $profesor)):
				$profesor-> id = $id;
				return $this->respondUpdated($profesor);
			else:
				return $this->failServerError($this->model->validation->listErrors());
			endif;
		} catch (\Exception $e) {
			return $this->failServerError('Ha ocurrido un error en el servidor');
		}	
	}


	public function delete($id = null)
	{
		try {
			if ($id== null)
				return $this->failValidationError('No se ha pasado un ID valido');
				$profesorVerificado= $this->model->find($id);

				//validar que el ID no venga nulo
			if ($profesorVerificado == null)
				return $this->failNotFound('No se ha encontrado un cliente con el id: '.$id);


			if ($this->model->delete($id)):
				return $this->respondDeleted($profesorVerificado);
			else:
				return $this->failServerError('No se ha podido eliminar el registro');
			endif;
		} catch (\Exception $e) {
			return $this->failServerError('Ha ocurrido un error en el servidor');
		}	
	}
}