<?php
namespace Src;

use Core\Route as MainRoute;

class Routes extends MainRoute
{
	function __construct($uri = null){
		parent::__construct($uri);

		$this->call('/', 'AuthController');

		//authentication routes
		$this->call('/login', 'AuthController', 'login');
		$this->call('/logout', 'AuthController', 'logout');
		$this->call('/authenticate', 'AuthController', 'authenticate');

		//user routes
		$this->call('/user/register', 'UserController');
		$this->call('/user/store', 'UserController', 'store');
		$this->call('/user/manage', 'UserController', 'manage');

		//course routes
		$this->call('/course/register', 'CourseController');
		$this->call('/course/store', 'CourseController', 'store');
		$this->call('/course/manage', 'CourseController', 'manage');
		$this->call('/course', 'CourseController', 'show');

		//matter routes
		$this->call('/matter/store', 'MatterController', 'store');
		$this->call('/matter', 'MatterController', 'show');

		//topics routes
		$this->call('/topic/store', 'TopicController', 'store');
		$this->call('/topic/delete', 'TopicController', 'delete');


		//do not remove
		$this->notFoundHttpStatus();
	}
}