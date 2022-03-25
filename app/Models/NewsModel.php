<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
	protected $table = 'news';

	public function getNews($slug = false)
	{
		// Add these lines somewhere on top of your PHP file:
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		if ($slug === false) {
			return $this->findAll();
		}
		var_dump(123);die;
		return $this->where(['slug' => $slug])->first();
	}
}