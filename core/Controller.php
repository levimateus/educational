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


	public function verifySession($key){
		session_start();
		if (isset($_SESSION[$key]) && !empty($_SESSION[$key])) {
			return true;
		} else {
			return false;
		}
	}

	public function destroySession($key){
		session_start();
		if ($this->verifySession($key)){
			$_SESSION[$key] = null;
			session_destroy();
			return true;
		} else {
			return false;
		}
	}
}