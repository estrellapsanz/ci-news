<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
	protected $table = 'news';

	public function getNews($slug = false)
	{
		var_dump(123);die;
		if ($slug === false) {
			var_dump(123);die;
			return $this->findAll();
		}
		var_dump(123);die;
		return $this->where(['slug' => $slug])->first();
	}
}