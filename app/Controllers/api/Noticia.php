<?php

namespace App\Controllers\api;

use CodeIgniter\RESTful\ResourceController;

class Noticia extends ResourceController
{
	protected $modelName = 'App\Models\NewsModel';
	protected $format = 'json';

	public function index()
	{
		return $this->genericResponse($this->model->getApiNews(), NULL, 200);
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
		return $this->genericResponse($this->model->getApiNews($id), NULL, 200);
	}
}