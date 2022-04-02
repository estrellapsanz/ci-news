<?php

namespace App\Controllers;

use App\Models\NewsModel;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class News extends BaseController
{

	function __construct()
	{

		/* Loading user modal and session library */
		$this->model = model(NewsModel::class);
		$this->admin = false;
	}

	public function index()
	{
		return view('welcome_message');
	}

	public function hotNews($newId = false)
	{
		$data['title'] = 'Noticias de actualidad';

		if (is_numeric($newId)) {

			$new = $this->model->getNews($newId);

			if ($new !== null) {
				$data['news'][0] = $new;
				$data['title'] = $data['news'][0]['titulo'];
			} else {
				$data['news'][0] = null;
				$data['title'] = 'Noticia no encontrada';
			}
		} else
			$data['news'] = $this->model->getNews();


		echo view('templates/header', ['data' => $data, 'admin' => $this->admin]);
		echo view('pages/news', $data);
		echo view('templates/footer.php', ['data' => $data, 'admin' => $this->admin]);
	}
}
