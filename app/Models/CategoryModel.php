<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
	protected $table = 'news';
	protected $allowedFields = ['id', 'titulo', 'id_categoria', 'resumen', 'autor',
		'fecha_publicacion', 'imagen', 'resumen'];

	public function getNews($slug = false)
	{

		if ($slug === false) {
			return $this->findAll();
		}

		return $this->where(['id' => $slug])->first();
	}

	public function addNew($data)
	{

		if ($data !== false) {
			return $this->insert($data);
		}
		return -1;

	}

	public function editNew($data)
	{

		if ($data !== false) {
			return $this->update(
				$data['id'],
				[
					'titulo' => $data['titulo'],
					'autor' => $data['autor'],
					'fecha_publicacion' => $data['fecha_publicacion'],
					//'imagen' => $data['imagen'],
					'resumen' => $data['resumen'],
					'id_categoria' => $data['id_categoria']
				]);
		}
		return -1;

	}
}