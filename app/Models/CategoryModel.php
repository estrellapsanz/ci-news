<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
	protected $table = 'categoria';
	protected $allowedFields = ['id', 'nombre'];

	public function getCategories($slug = false)
	{

		if ($slug === false) {
			return $this->findAll();
		}

		return $this->where(['id' => $slug])->first();
	}

	public function addCategorie($data)
	{

		if ($data !== false) {
			return $this->insert($data);
		}
		return -1;

	}

	public function editCategorie($data)
	{

		if ($data !== false) {
			return $this->update(
				$data['id'],
				[
					'nombre' => $data['nombre']
				]);
		}
		return -1;

	}

	public function getApiNews($slug = false)
	{
		if (!$slug)
			return $this->select('id, titulo')->findAll();
		else
			return $this->select()->where(['id' => $slug])->findAll();
	}
}