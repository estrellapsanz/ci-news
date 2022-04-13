<?php

namespace App\Controllers;

use App\Models\NewsModel;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class Admin extends BaseController
{

	function __construct()
	{
		$this->model = model(NewsModel::class);
		$this->admin = true;
	}


	public function index()
	{
		$data['title'] = 'Administración de noticias';
		$data['news'] = $this->model->getNews();
		echo view('templates/header', ['data' => $data, 'admin' => $this->admin]);
		echo view('pages/admin', $data);
		echo view('templates/footer.php', $data);
	}

	public function new($save = false)
	{

		$data['title'] = 'Nueva Noticia';
		var_dump($this->request->getMethod());
		var_dump($this->request->getVar('titulo'));
		var_dump($_POST);
		die;

		/*if (1 || $this->request->getMethod() === 'post' && $this->validate([
				'titulo' => 'required|min_length[3]|max_length[200]',
				'resumen' => 'required',
				'autor' => 'required',
				'fecha' => 'required|date',
				'categoria' => 'required|number'
			]))
		*/


		if (0) {

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
			$ok = $this->model->addNew($data);
			var_dump($ok);;
			if ($ok != -1) {
				$data['news'] = $this->model->getNews();
				$data['admin'] = true;
				$data['title'] = 'Noticias ';
				echo view('templates/header', ['data' => $data, 'admin' => $this->admin]);
				echo view('pages/admin', $data);
				echo view('templates/footer.php', ['data' => $data, 'admin' => $this->admin]);
				return;
			} else {
				throw new \CodeIgniter\Exceptions\ModelException('error en el insert');
			}
		} else {
			echo view('templates/header', ['data' => $data, 'admin' => $this->admin]);
			echo view('pages/new', $data);
			echo view('templates/footer.php', ['data' => $data, 'admin' => $this->admin]);
		}
	}

	/*public function editNew($id = true)
	{
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

		echo view('templates/header');
		echo view('pages/admin/');
		echo view('templates/footer.php');
	}*/

	public function savenew()
	{
		var_dump(23);
		die;
		var_dump($this->request->getPost());
		die;
		var_dump($this->request);
		die;

		$this->request->getMethod() === 'post' && $this->validate([
			'titulo' => 'required|min_length[3]|max_length[200]',
			'resumen' => 'required',
			'autor' => 'required',
			'fecha' => 'required|date',
			'categoria' => 'required|number'
		]);
	}
}