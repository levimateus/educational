<?php 
namespace Src\Controllers;

use Core\Controller as MainController;
use Core\DBConnection;
use Src\Models\User;

class LoginController extends MainController
{
	public function index(){
		if ($this->verifySession('user')) {
			$this->redirect('/');
			return true;
		}
		
		$this->view('login_page');
	}

	public function authenticate(){
		if ($this->verifySession('user')) {
			return true;
		}

		$user = new User();
		$connection = new DBConnection();
		$connection->connect();

		$userName = isset($_POST['login']) ? $_POST['login'] : '';
		$password = isset($_POST['password']) ? md5($_POST['password']) : '';
		
		if ($user->authenticateUser($userName, $password, $connection->getConnection())){
			$_SESSION['user'] = $user->id;
			$this->redirect('/'); 
		} else {
			$this->redirect('/login');
		}
	}

	public function logout(){
		$this->destroySession('user');
		$this->redirect('/');
		return false;
	}
}