<?php 

namespace Core;

use Src\Routes;

class Controller
{
	public function view($view){
		$view = rtrim($view);

		$file = __DIR__.'/../src/views/'.$view.'.php';

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