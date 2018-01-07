<?php 
namespace Src\Controllers;

use Core\Controller as MainController;
use Src\Models\VO\User;
use Src\Models\DAO\UserDAO;

use Src\Models\DAO\CourseDAO;

class AuthController extends MainController
{
	public function index(){
		if ($this->redirectIfNotAuthenticated('user', '/login')){
 			return true;
 		}

 		$courseDAO = new CourseDAO();

 		$courses = $courseDAO->selectAll();

		$this->view('home', compact('courses'));
	}

	public function login($fail){
		if ($this->redirectIfAuthenticated('user', '/')){
 			return true;
 		}
		
		$this->view('login_page', $fail);
	}

	public function authenticate(){
		if ($this->redirectIfAuthenticated('user', '/')){
 			return true;
 		}

		$userDAO = new UserDAO();

		if (   
			(isset($_POST['login'])    && !empty($_POST['login'])&& 
			(isset($_POST['password']) && !empty($_POST['password'])))
		){

			$userName = $_POST['login'];
			$password = md5($_POST['password']);

			$user = $userDAO->authenticateUser($userName, $password);

			if ($user != false){
				$session = array('id' => $user->getId(), 'role' => $user->getRole());
				$_SESSION['user'] = $session;
				$this->redirect('/'); 
			} else {
				$this->redirect('/login-fail');
			}
		} else {
			$this->redirect('/login');
		}
	}

	public function logout(){
		if ($this->redirectIfNotAuthenticated('user', '/login')){
 			return true;
 		}
		$this->destroySession('user');
		$this->redirect('/');
		return false;
	}
}