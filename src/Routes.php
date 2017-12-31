<?php
namespace Src;

use Core\Route as MainRoute;

class Routes extends MainRoute
{
	function __construct($uri = null){
		parent::__construct($uri);

		$this->call('/', 'LoginController');
		$this->call('/login', 'LoginController', 'authenticate');

		//do not remove
		$this->notFoundHttpStatus();
	}
}