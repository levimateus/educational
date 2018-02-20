<?php
namespace Src\Controllers;

use Core\Controller as MainController;
use Src\Models\DAO\CourseDAO;
use Src\Models\DAO\MatterDAO;
use Src\Models\DAO\TopicDAO;

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
 		$topicDAO  = new TopicDAO();
 		$courseDAO = new CourseDAO();

 		$matter = $matterDAO->selectOne($id);
 		$topics = $topicDAO->selectByMatter($id);
 		$course = $courseDAO->selectOne($matter->getCourseId());

 		$this->view('matter/matter_page', compact('matter', 'topics', 'course'));
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