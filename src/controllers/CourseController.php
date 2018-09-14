<?php 
namespace Src\Controllers;

use Core\Controller as MainController;
use Core\DBConnection;
use Src\Models\VO\Course;
use Src\Models\DAO\CourseDAO;
use Src\Models\VO\Matter;
use Src\Models\DAO\MatterDAO;

class CourseController extends MainController
{
	public function index(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_ADMIN) == false)
		){
 			return true;
 		}

 		$this->view('course/create_course');
	}

	public function manage(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_ADMIN) == false)
		){
 			return true;
 		}

 		$courseDAO = new CourseDAO();
 		$session = $_SESSION['user'];
 		$courses = $courseDAO->selectByUser($session['id']);
 		$this->view('course/manage_courses', compact('courses'));
	}

	public function store(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_ADMIN) == false)
		){
 			return true;
 		}

 		$course = new Course();
 		$user = isset($_SESSION['user']) ? $_SESSION['user'] : '';

 		if(isset($_POST['name']) && !empty($_POST['name'])){
 			$course->setName($_POST['name']);
	 		$course->setDescription($_POST['description']);
	 		$course->setUserId($user['id']);

	 		$courseDAO = new CourseDAO();

			if ($courseDAO->save($course)) {
				$this->redirect('/course/manage');
			}else{
				echo "It didn't work";
			}
 		} else {
 			$this->forbiddenHttpStatus();
 		}
	}

	public function delete(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_ADMIN) == false)
		){
 			return true;
 		}
	}

	public function show($id){
		$this->redirectIfNotAuthenticated('user', '/login');

 		if (!isset($id)) {
 			$this->forbiddenHttpStatus();
 			return true;
 		}

 		$courseDAO = new CourseDAO();
 		$course = $courseDAO->selectOne($id);

 		$matterDAO = new MatterDAO();
 		$matters = $matterDAO->selectByCourse($id);


 		$this->view('course/course_page', compact('course', 'matters'));
	}

	public function update(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_ADMIN) == false)
		){
 			return true;
 		}
	}
}