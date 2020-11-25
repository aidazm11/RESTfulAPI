<?php namespace App\Controllers\API;

use App\Models\GradoModel;
use CodeIgniter\RESTful\ResourceController;

class Grados extends ResourceController
{
	public function __construct(){
		$this ->model = $this->setModel(new GradoModel());
	}

	public function index()
	{
		$grados = $this->model->findAll();
		return $this->respond($grados);
		
	}

	public function create(){
		try {

			$grado = $this->request->getJSON();
			if ($this->model->insert($grado)):
				$grado->id=$this->model->insertID();
				return $this->respondCreated($grado);
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
			if ($id==null):
				return $this->failValidationError('No se ha pasado un ID valido');
				$grado= $this->model->find($id);

				//validar que el ID no venga nulo
			if ($grado == null)
				return $this->failNotFound('No se ha encontrado un cliente con el id: '.$id);

				return $this->respond($grado);
			endif;
		} catch (\Exception $e) {
			return $this->failServerError('Ha ocurrido un error en el servidor');
		}	
	}

	public function update($id = null)
	{
		try {
			if ($id== null)
				return $this->failValidationError('No se ha pasado un ID valido');
				$gradoVerificado= $this->model->find($id);

				//validar que el ID no venga nulo
			if ($gradoVerificado == null)
				return $this->failNotFound('No se ha encontrado un cliente con el id: '.$id);

				$grado =$this-> request->getJSON();

			if ($this->model->update($id, $grado)):
				$grado-> id = $id;
				return $this->respondUpdated($grado);
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
			if ($id==null)
				return $this->failValidationError('No se ha pasado un ID valido');
				$gradoVerificado= $this->model->find($id);

				//validar que el ID no venga nulo
			if ($gradoVerificado == null)
				return $this->failNotFound('No se ha encontrado un cliente con el id: '.$id);


			if ($this->model->delete($id)):
				return $this->respondDeleted($gradoVerificado);
			else:
				return $this->failServerError('No se ha podido eliminar el registro');
			endif;
		} catch (\Exception $e) {
			return $this->failServerError('Ha ocurrido un error en el servidor');
		}	
	}
}