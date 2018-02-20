<?php 
namespace Src\Controllers;

use Core\Controller as MainController;
use Src\Models\VO\Topic;
use Src\Models\DAO\TopicDAO;

class TopicController extends MainController
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

 		if (
 			(isset($_POST['matter_id']) && !empty($_POST['matter_id'])) &&
 			(isset($_POST['title']) && !empty($_POST['title'])) &&
 			(isset($_POST['content']) && !empty($_POST['content']))
 		) {

 			$matter = new Topic();

	 		$matter->setMatterId($_POST['matter_id']);
			$matter->setUserId($_SESSION['user']['id']);
			$matter->setTitle($_POST['title']);
			$matter->setContent($_POST['content']);

			$matterDAO = new TopicDAO();

			if ($matterDAO->save($matter)) {
				$this->redirect('/matter-'.$_POST['matter_id']);
			} else{
				echo "It did not work";
			}	
 		} else {
 			$this->redirect('/matter-'.$_POST['matter_id']);
 		}
	}

	public function delete(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_TEACHER) == false)
		){
 			return true;
 		}

 		$id = $_POST['topic_id'];
 		$matterId = $_POST['matter_id'];

 		$topicDAO = new TopicDAO();

 		if (isset($_POST['topic_id'])) {
 			if ($topicDAO->delete($id)) {
 				$this->redirect('/matter-'.$matterId);
 			} else {
 				echo "It didn't work";
 			}
 		}
 		
 		$this->redirect('/matter-'.$matterId);
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