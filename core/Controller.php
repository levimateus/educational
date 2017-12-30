<?php 

namespace Core;

use Src\Routes;

class Controller
{
	public function view($view){
		$view = rtrim($view);

		$file = PROJECT_VIEWS_DIR.$view.'.php';

		if (file_exists($file)) {
			include($file);
		} else {
			echo "Error";
		}
	}

	public function redirect($uri){
		header('Location: /educational'.$uri);
	}
}