<?php 

namespace Core;

use Src\Routes;

abstract class Controller
{
	private $attribute = 0;

	public function view($view){
		$view = rtrim($view);

		$file = PROJECT_VIEWS_DIR.$view.'.php';

		if (file_exists($file)) {
			include($file);
		} else {
			$this->internalServerErrorHttpStatus();
		}
	}

	public function redirect($uri){
		header('Location: /educational'.$uri);
	}

	public function internalServerErrorHttpStatus(){
		header('HTTP/1.1 500 Internal Server Error');
		return null;
	}
}