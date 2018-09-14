<?php 
namespace Src\Controllers;

use Core\Controller as MainController;
use Src\Models\VO\Notice;
use Src\Models\DAO\NoticeDAO;
use Src\Models\DAO\MatterDAO;
use Src\Models\DAO\CourseDAO;

class NoticeController extends MainController
{
	public function index($id){
		$this->redirectIfNotAuthenticated('user', '/login');
		 
 		$matterDAO = new MatterDAO();
 		$noticeDAO  = new NoticeDAO();
 		$courseDAO = new CourseDAO();

 		$matter = $matterDAO->selectOne($id);
 		$notices = $noticeDAO->selectByMatter($id);
 		$course = $courseDAO->selectOne($matter->getCourseId());

 		$this->view('notice/notice_page', compact('matter', 'notices', 'course'));
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

 			$notice = new Notice();

	 		$notice->setMatterId($_POST['matter_id']);
			$notice->setUserId($_SESSION['user']['id']);
			$notice->setTitle($_POST['title']);
			$notice->setContent($_POST['content']);

			$noticeDAO = new NoticeDAO();

			if ($noticeDAO->save($notice)) {
				$this->redirect('/notice/matter-'.$_POST['matter_id']);
			} else{
				echo "It did not work";
			}	
 		} else {
 			$this->redirect('/notice/matter-'.$_POST['matter_id']);
 		}
	}

	public function delete(){
		if (
			 $this->redirectIfNotAuthenticated('user', '/login') ||
			($this->requiredUserAccessLevel(PROJECT_TEACHER) == false)
		){
 			return true;
 		}

 		$id = $_POST['notice_id'];
 		$matterId = $_POST['matter_id'];

 		$noticeDAO = new NoticeDAO();

 		if (isset($_POST['notice_id'])) {
 			if ($noticeDAO->delete($id)) {
 				$this->redirect('/matter-'.$matterId);
 			} else {
 				echo "It didn't work";
 			}
 		}
 		
 		$this->redirect('/notice/matter-'.$matterId);
	}

	public function show(){
		$this->redirectIfNotAuthenticated('user', '/login');
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