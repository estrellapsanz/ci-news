<?php

namespace App\Controllers;

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

	public function hotNews(){
		$data['title']='Hot News';
		$data['news'][0]= [
						'titulo'=>'Guerra en Ucrania',
						'autor'=>'Estrella Parrilla Sanz',
						'fecha'=>date("F j, Y, g:i a"),
						'contenido'=>'Lorem ipsum ',
						'image'=>'guerra-ucrania.jpg',
			            'categoria'=>'actualidad',
						'resumen'=>'La guerra dura ya más de un mes'];

		$data['news'][1]= [
			'titulo'=>'Guerra en Ucrania',
			'autor'=>'Estrella Parrilla Sanz',
			'fecha'=>date("F j, Y, g:i a"),
			'contenido'=>'Lorem ipsum ',
			'image'=>'guerra-ucrania.jpg',
			'categoria'=>'actualidad',
			'resumen'=>'La guerra dura ya más de un mes'];


		echo view('templates/header', $data);
		echo view('pages/news', $data);
		echo view('templates/footer.php', $data);
	}
}