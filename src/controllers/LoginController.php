<?php 
namespace Src\Controllers;

use Core\Controller as MainController;

class LoginController extends MainController
{
	public function index(){
		$this->view('login_page');
	}

	public function authenticate(){
		echo "<h1>Bem vindo ao sistema educacional<h1>";
		echo "<p>";
		echo "Login: ".$_POST['login'];
		echo "<br>Senha: ".$_POST['password'];
		echo "</p>";
	}
}