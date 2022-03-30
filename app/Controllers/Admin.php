<?php

namespace App\Controllers;

use App\Models\NewsModel;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class Admin extends BaseController
{

	public function index()
	{
		$data['admin'] = true;
		$data['title'] = 'Administración de noticias';
		$model = model(NewsModel::class);
		$data['news'] = $model->getNews();
		echo view('templates/header', $data);
		echo view('pages/admin', $data);
		echo view('templates/footer.php', $data);

	}

	public function new()
	{

		$data['admin'] = true;
		$data['title'] = 'Nueva Noticia';

		/*if (1 || $this->request->getMethod() === 'post' && $this->validate([
				'titulo' => 'required|min_length[3]|max_length[200]',
				'resumen' => 'required',
				'autor' => 'required',
				'fecha' => 'required|date',
				'categoria' => 'required|number'
			]))
		*/


		if (1) {
			$model = model(NewsModel::class);
			/*$post = $this->request->getPost();

			$data['titulo'] = $post['titulo'];
			$data['resumen'] = $post['resumen'];
			$data['id_categoria'] = $post['categoria'];
			$data['autor'] = $post['autor'];
			$data['fecha_publicacion'] = $post['fecha'];
			//$data['imagen']=>$post['imagen'];*/

			$data['titulo'] = 'test test';
			$data['autor'] = 'Estrella';
			$data['resumen'] = 'resumen';
			$data['id_categoria'] = 1;
			$data['fecha_publicacion'] = '2021/03/03';
			$ok = $model->addNew($data);
			var_dump($ok);;
			if ($ok != -1) {
				$data['news'] = $model->getNews();
				$data['admin'] = true;
				$data['title'] = 'Noticias ';
				echo view('templates/header', $data);
				echo view('pages/admin', $data);
				echo view('templates/footer.php', $data);
				return;
			} else {
				throw new \CodeIgniter\Exceptions\ModelException('error en el insert');

			}

		} else {
			echo view('templates/header', $data);
			echo view('pages/new', $data);
			echo view('templates/footer.php', $data);
		}

	}

	public function editNew($newId = true)
	{
		/*	ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
	*/
		$data['admin'] = true;
		if (is_numeric($newId)) {
			$data['title'] = 'Editar noticia: ' . $newId;
			$model = model(NewsModel::class);
			$data['new'] = $model->getNews($newId);
			if (empty($data['news'])) {
				throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: ' . $slug);
			}
			echo view('templates/header', $data);
			echo view('pages/news/new', $data);
			echo view('templates/footer.php', $data);
			return;
		}

		echo view('templates/header', $data);
		echo view('pages/news', $data);
		echo view('templates/footer.php', $data);
	}
}