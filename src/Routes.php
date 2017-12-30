<?php
namespace Src;

use Core\Route as MainRoute;

class Routes extends MainRoute
{
	function __construct($uri = null){
		parent::__construct($uri);

		$this->get('/', 'WelcomeController');
		$this->get('/redirecionar', 'WelcomeController', 'redirecionar');
		$this->get('/funcionou', 'WelcomeController', 'funcionou');

		//do not remove
		$this->notFoundHttpStatus();
	}
}