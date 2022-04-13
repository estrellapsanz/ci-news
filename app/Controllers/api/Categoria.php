<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;

class Categoria extends ResourceController
{
	protected $modelName = 'App\Models\CategoryModel';
	protected $format = 'json';

	public function index()
	{
		return $this->genericResponse($this->model->findAll(), NULL, 200);
	}

	private function genericResponse($data, $msj, $code)
	{
		if ($code == 200) {
			return $this->respond(array("data" => $data, "code" => $code));
			//, 404, "No hay nada"
		} else {
			return $this->respond(array(
				"msj" => $msj,
				"code" => $code));
		}
	}

	public function show($id = NULL)
	{
		return $this->genericResponse($this->model->find($id), NULL, 200);
	}
}