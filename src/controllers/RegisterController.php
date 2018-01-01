<?php
namespace Src\Controllers;

use Core\Controller as MainController;
use Core\DBConnection;

use Src\Models\User;

class RegisterController extends MainController
{
	public function index(){
		$this->view('register_page');
	}

	public function createUser(){
		$user = new User();

		$user->setName($_POST['name']);
		$user->setUserName($_POST['user_name']);
		$user->setPassword(md5($_POST['password']));
		$user->setRegisterCode($_POST['register_code']);
		$user->setRole($_POST['role']);

		echo "<br>".$user->getName();
		echo "<br>".$user->getUserName();
		echo "<br>".$user->getPassword();
		echo "<br>".$user->getRegisterCode();
		echo "<br>".$user->getRole();

		$connection = new DBConnection();
		$connection->connect();

		if ($user->save($connection->getConnection())) {
			$this->redirect('/');
		}else{
			echo "Não funcionou";
		}
	}
}