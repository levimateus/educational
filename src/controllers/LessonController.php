<?php 
namespace Src\Controllers;

use Core\Controller as MainController;
use Src\Models\VO\Matter;
use Src\Models\DAO\MatterDAO;

class LessonsController extends MainController
{
	public function index(){
		//creation form
		if ($this->redirectIfNotAuthenticated('user', '/login')){
 			return true;
 		}
	}

	public function store(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_TEACHER) == false)
		){
 			return true;
 		}
 		
	}

	public function delete(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_TEACHER) == false)
		){
 			return true;
 		}
	}

	public function show(){
		if ($this->redirectIfNotAuthenticated('user', '/login')){
 			return true;
 		}
	}

	public function update(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_TEACHER) == false)
		){
 			return true;
 		}
	}
}