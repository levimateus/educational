<?php
namespace Src;

use Core\Route as MainRoute;

class Routes extends MainRoute
{
	function __construct($uri = null){
		parent::__construct($uri);

		$this->call('/', 'WelcomeController');
		$this->call('/login', 'LoginController');
		$this->call('/authenticate', 'LoginController', 'authenticate');
		$this->call('/logout', 'LoginController', 'logout');
		$this->call('/register', 'RegisterController');
		$this->call('/create_user', 'RegisterController', 'createUser');

		//do not remove
		$this->notFoundHttpStatus();
	}
}