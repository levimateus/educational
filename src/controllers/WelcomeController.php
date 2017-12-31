<?php 
namespace Src\Controllers;

use Core\Controller as MainController;
use Src\Models as Models;

 class WelcomeController extends MainController
 {
 	function index(){
		$this->view('welcome');
		$course = new Models\Course();
		$lesson = new Models\Lesson();
		$matter = new Models\Matter();
		$topic = new Models\Topic();
		$user = new Models\User();
 	}
 }