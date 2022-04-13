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

	public function new($param = false)
	{
		$data['title'] = 'Nueva Noticia';


		if ($param == 'save' && $this->request->getMethod() === 'post' && 1 /*$this->validate([
				'titulo' => 'required|min_length[3]|max_length[200]',
				'resumen' => 'required',
				'autor' => 'required',
				'fecha' => 'required|date',
				'categoria' => 'required|number'
			]) */
		) {

			$post = $this->request->getPost();
			$files = $this->request->getFiles();

			$data['titulo'] = $post['titulo'];
			$data['resumen'] = $post['resumen'];
			$data['id_categoria'] = $post['categoria'];
			$data['autor'] = $post['autor'];
			$data['fecha_publicacion'] = $post['fecha'];
			//$data['imagen']=>$files['name']['imagen'];*/

			$ok = $this->model->addNew($data);

			if ($ok != -1)
				return redirect()->to('/admin');
			else
				throw new \CodeIgniter\Exceptions\ModelException('error creando nueva noticia');

		} else {

			echo view('templates/header', ['data' => $data, 'admin' => $this->admin]);
			echo view('pages/new', $data);
			echo view('templates/footer.php', ['data' => $data, 'admin' => $this->admin]);
		}
	}

	public function edit($param = true)
	{
		$data['title'] = 'Editar Noticia';

		if (is_numeric($param)) {

			$data['new'] = $this->model->getNews($param);

			if (empty($data['new'])) {
				throw new \CodeIgniter\Exceptions\ModelException('error recuperando noticia');
			}
			$data['admin'] = true;

			echo view('templates/header', ['data' => $data, 'admin' => $this->admin]);
			echo view('pages/edit', $data);
			echo view('templates/footer.php', ['data' => $data, 'admin' => $this->admin]);

		} else if ($param == 'save') {

			$post = $this->request->getPost();
			$files = $this->request->getFiles();

			$data['id'] = $post['id'];
			$data['titulo'] = $post['titulo'];
			$data['resumen'] = $post['resumen'];
			$data['id_categoria'] = $post['categoria'];
			$data['autor'] = $post['autor'];
			$data['fecha_publicacion'] = $post['fecha'];
			//$data['imagen']=>$files['name']['imagen'];*/

			$updated = $this->model->editNew($data);

			if ($updated !== -1) {
				return redirect()->to('/admin');
			} else

				throw new \CodeIgniter\Exceptions\ModelException('error creando nueva noticia');


		} else
			throw new \CodeIgniter\Exceptions\PageNotFoundException('error recuperando noticia');


	}

}