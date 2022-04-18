<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\NewsModel;
use Myth\Auth\Models\userModel;


class Admin extends BaseController
{

	function __construct()
	{

		$this->session = service('session');
		$this->model = model(NewsModel::class);
		$this->admin = true;
		helper('auth');
		$this->userModel = model(UserModel::class);
		$this->categoryModel = model(CategoryModel::class);
	}


	public function index()
	{

		if (!logged_in())
			return redirect()->to('/login');

		if (!in_groups('admins')) {
			return redirect()->to('/');
		}

		$data['title'] = 'Administración de noticias';
		$data['news'] = $this->model->getNews();
		echo view('templates/header', ['data' => $data, 'admin' => $this->admin]);
		echo view('pages/admin', $data);
		echo view('templates/footer.php', $data);
	}

	public function new($param = false)
	{

		if (!logged_in())
			return redirect()->to('/login');

		if (!in_groups('admins')) {
			return redirect()->to('/');
		}


		$data['title'] = 'Nueva Noticia';
		$data['categorias'] = $this->categoryModel->getCategories();

		if ($param == 'save' && $this->request->getMethod() === 'post') {

			$post = $this->request->getPost();
			$files = $this->request->getFiles();

			$data['titulo'] = $post['titulo'];
			$data['resumen'] = $post['resumen'];
			$data['id_categoria'] = $post['categoria'];
			$data['autor'] = $post['autor'];
			$data['fecha_publicacion'] = $post['fecha'];
			$data['imagen'] = $files['imagen']->getName();

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

		if (!logged_in())
			return redirect()->to('/login');

		if (!in_groups('admins')) {
			return redirect()->to('/');
		}

		$data['title'] = 'Editar Noticia';


		if (is_numeric($param)) {

			$data['new'] = $this->model->getNews($param);
			$data['categorias'] = $this->categoryModel->getCategories();

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