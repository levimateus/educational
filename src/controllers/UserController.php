<?php
namespace Src\Controllers;

use Core\Controller as MainController;

use Src\Models\Vo\User;
use Src\Models\DAO\UserDAO;

class UserController extends MainController
{
	public function index(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_ADMIN) == false)
		){
 			return true;
 		}
	
		$this->view('user/create_user');
	}

	public function manage(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_ADMIN) == false)
		){
 			return true;
 		}

 		$userDAO = new UserDAO();

 		$users =  $userDAO->selectAll();

 		$this->view('user/manage_users', compact('users'));
	}

	public function delete(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_ADMIN) == false)
		) {
			return true;
		}

		$userDAO = new UserDAO();

		if (isset($_POST['id'])) {
			$id = $_POST['id'];

			if ($userDAO->delete($id)) {
				$this->redirect('/user/manage');
			} else {
				echo "It doesn't work";
			}
			
		} else {
			$this->redirect('/user/manage');
		}
	}

	public function store(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_ADMIN) == false)
		){
 			return true;
 		}

		$userDAO = new UserDAO();


		if (
			(isset($_POST['name'])          && !empty($_POST['name']))          &&
			(isset($_POST['user_name'])     && !empty($_POST['user_name']))     &&
			(isset($_POST['password'])      && !empty($_POST['password']))      &&
			(isset($_POST['register_code']) && !empty($_POST['register_code'])) &&
			 isset($_POST['role'])
		) {
			$user = new User();
			$user->setName($_POST['name']);
			$user->setUserName($_POST['user_name']);
			$user->setPassword(md5($_POST['password']));
			$user->setRegisterCode($_POST['register_code']);
			$user->setRole($_POST['role']);

			if ($userDAO->save($user)) {
				$this->redirect('/user/manage');
			}else{
				echo "Não funcionou";
			}
		} else {
			$this->redirect('/user/manage');
		}

		
	}
}