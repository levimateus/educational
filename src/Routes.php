<?php
namespace Src;

use Core\Route as MainRoute;

class Routes extends MainRoute
{
	function __construct($uri = null){
		parent::__construct($uri);

		$this->call('/', 'AuthController');

		//attachment routes
		$this->call('/attachment/delete', 'AttachmentController', 'delete');
		$this->call('/attachment/store', 'AttachmentController', 'store');

		//authentication routes
		$this->call('/authenticate', 'AuthController', 'authenticate');
		$this->call('/login', 'AuthController', 'login');
		$this->call('/logout', 'AuthController', 'logout');
		
		//password recovery routes
		$this->call('/password/forgot', 'AuthController', 'forgotPassword');
		$this->call('/password/redefine', 'AuthController', 'sendPasswordRedefinitionEmail');

		//course routes
		$this->call('/course', 'CourseController', 'show');
		$this->call('/course/manage', 'CourseController', 'manage');
		$this->call('/course/register', 'CourseController');
		$this->call('/course/store', 'CourseController', 'store');

		//forum routes
		$this->call('/forum', 'ForumController', 'show');
		$this->call('/forum/matter', 'ForumController');

		$this->call('/forum/store', 'ForumController', 'store');
		$this->call('/forum/delete', 'ForumController', 'delete');

		$this->call('/forum/answer/store', 'ForumController', 'storeAnswer');
		$this->call('/forum/answer/delete', 'ForumController', 'deleteAnswer');

		//matter routes
		$this->call('/matter', 'MatterController', 'show');
		$this->call('/matter/store', 'MatterController', 'store');

		//topics routes
		$this->call('/topic/delete', 'TopicController', 'delete');
		$this->call('/topic/store', 'TopicController', 'store');

		//notices routes
		$this->call('/notice/matter', 'NoticeController');
		$this->call('/notice/delete', 'NoticeController', 'delete');
		$this->call('/notice/store', 'NoticeController', 'store');

		//user routes
		$this->call('/user/delete', 'UserController', 'delete');
		$this->call('/user/manage', 'UserController', 'manage');
		$this->call('/user/register', 'UserController');
		$this->call('/user/store', 'UserController', 'store');

		//do not remove
		$this->notFoundHttpStatus();
	}
}