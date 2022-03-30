<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
	public function index()
	{
		return view('welcome_message');

	}

	public function view($page='news'){
		if (! is_file(APPPATH . 'Views/pages/' . $page . '.php')) {
			// Whoops, we don't have a page for that!
			throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
		}

		$data['title'] = ucfirst($page); // Capitalize the first letter

		echo view('templates/header', $data);
		echo view('pages/' . $page, $data);
		echo view('templates/footer.php', $data);
	}

	public function hotNews($newId=false){
		ini_set('display_errors', 1);
		ini_set('display_startup_errors', 1);
		error_reporting(E_ALL);

		$data['title']='Noticias de actualidad';
		$model = model(NewsModel::class);
		$data['news'] = $model->getNews();


		if (is_numeric($newId)){
			$data['title']='Noticia';
			$data['new'] = $model->getNews($newId);
			echo view('templates/header', $data);
			echo view('pages/news/'.$newId, $data);
			//echo view('pages/news', $data); y no poner foreach en vista
			echo view('templates/footer.php', $data);
			return ;
		}


		echo view('templates/header', $data);
		echo view('pages/news', $data);
		echo view('templates/footer.php', $data);
	}
}