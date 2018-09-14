<?php 

namespace Core;

use Src\Routes;

abstract class Controller
{
	private $attribute = 0;

	protected function view($view, $param = null){
		$view = rtrim($view);

		$file = PROJECT_VIEWS_DIR.$view.'.php';

		if (file_exists($file)) {
			include($file);
		} else {
			$this->internalServerErrorHttpStatus();
		}
	}

	private function internalServerErrorHttpStatus(){
		header('HTTP/1.1 500 Internal Server Error');
		exit();
	}

	public function forbiddenHttpStatus(){
		header('HTTP/1.1 403 Forbidden');
		exit();
	}

	protected function redirect($uri){
		header('Location: '.$uri);
		exit();
	}

	protected function redirectIfAuthenticated($sessionKey, $redirect){
		if ($this->verifySession($sessionKey) == true) {
			$this->redirect($redirect);
		} else {
			return false;
		}
	}

	protected function redirectIfNotAuthenticated($sessionKey, $redirect){
		if ($this->verifySession($sessionKey) == false) {
			$this->redirect($redirect);
		} else {
			return false;
		}
	}

	protected function requiredUserAccessLevel($role){
		if(!isset($_SESSION['user'])){
			return false;
		}

		if ($_SESSION['user']['role'] == $role) {
			return true;
		} else {
			$this->forbiddenHttpStatus();
			return false;
		}
	}

	protected function createSession($key, $value){
		if(!isset($_SESSION)){
			session_start();
		}

		$_SESSION[$key] = $_SESSION($value);
	}

	protected function destroySession($key){
		$this->startSessionIfNotStarted();

		if ($this->verifySession($key)){
			$_SESSION[$key] = null;
			session_destroy();
			return true;
		} else {
			return false;
		}
	}

	private function startSessionIfNotStarted(){
		if(!isset($_SESSION)){
			session_start();
		}
	}

	protected function verifySession($key){
		$this->startSessionIfNotStarted();

		if (isset($_SESSION[$key]) && !empty($_SESSION[$key])) {
			return $_SESSION[$key];
		} else {
			return false;
		}
	}
}