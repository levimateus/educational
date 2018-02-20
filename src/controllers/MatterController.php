<?php
namespace Src\Controllers;

use Core\Controller as MainController;
use Src\Models\VO\Matter;
use Src\Models\DAO\MatterDAO;

class MatterController extends MainController
{
	public function store(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_TEACHER) == false)
		){
 			return true;
 		}

 		if (
 			(isset($_POST['year']) && !empty($_POST['year'])) &&
 			(isset($_POST['halfyear']) && !empty($_POST['halfyear'])) &&
 			(isset($_POST['name']) && !empty($_POST['name'])) &&
 			(isset($_POST['course_id']) && !empty($_POST['course_id']))
 		) {
 			
 			$key = !empty($_POST['key']) ? md5($_POST['key']) : '';

 			$matter = new Matter();

	 		$matter->setCourseId($_POST['course_id']);
			$matter->setUserId($_SESSION['user']['id']);
			$matter->setYear($_POST['year']);
			$matter->setHalfyear($_POST['halfyear']);
			$matter->setName($_POST['name']);
			$matter->setDescription($_POST['description']);
			$matter->setKey($key);

			$matterDAO = new MatterDAO();

			if ($matterDAO->save($matter)) {
				$this->redirect('/course-'.$_POST['course_id']);
			} else{
				echo "It did not work";
			}	
 		} else {
 			$this->redirect('/course-'.$_POST['course_id']);
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

	public function show($id){
		if ($this->redirectIfNotAuthenticated('user', '/login')){
 			return true;
 		}

 		$matterDAO = new MatterDAO();
 		$matter = new Matter();

 		$matter = $matterDAO->selectOne($id);

 		$this->view('matter/matter_page', compact('matter'));
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