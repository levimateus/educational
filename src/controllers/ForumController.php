<?php 
namespace Src\Controllers;

use Core\Controller as MainController;
use Src\Models\VO\Forum;
use Src\Models\DAO\ForumDAO;
use Src\Models\DAO\ForumPostDAO;
use Src\Models\DAO\MatterDAO;
use Src\Models\DAO\TopicDAO;
use Src\Models\DAO\CourseDAO;

class ForumController extends MainController
{

	public function index($id){
		if ($this->redirectIfNotAuthenticated('user', '/login')){
 			return true;
 		}

 		$courseDAO = new CourseDAO();
 		$forumDAO  = new ForumDAO();
 		$matterDAO = new MatterDAO();
 		$topicDAO  = new TopicDAO();

 		$forums = $forumDAO->selectByMatter($id);

 		$topics = $topicDAO->selectByMatter($id);
 		$matter = $matterDAO->selectOne($id);
 		$course = $courseDAO->selectOne($matter->getCourseId());

 		$this->view('forum/forums_list', compact('matter', 'topics', 'course', 'forums'));

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
 			(isset($_POST['title']) && !empty($_POST['title']))
 		) {

 			$forum = new Forum();

	 		$forum->setMatterId($_POST['matter_id']);
			$forum->setUserId($_SESSION['user']['id']);
			$forum->setTitle($_POST['title']);
			$forum->setDescription($_POST['description']);

			$forumDAO = new ForumDAO();

			if ($forumDAO->save($forum)) {
				$this->redirect('/forum/matter-'.$_POST['matter_id']);
			} else{
				echo "It did not work";
			}	
 		} else {
 			$this->redirect('/forum/matter-'.$_POST['matter_id']);
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

 		$forumDAO  = new ForumDAO();
 		$forumPostDAO = new ForumPostDAO();
 		$matterDAO = new MatterDAO();
 		$topicDAO  = new TopicDAO();
 		$courseDAO = new CourseDAO();

 		$forum  = $forumDAO->selectOne($id);
 		$forum_posts = $forumPostDAO->selectByForum($id);
 		$matter = $matterDAO->selectOne($forum->getMatterId());
 		$topics = $topicDAO->selectByMatter($matter->getId());
 		$course = $courseDAO->selectOne($matter->getCourseId());

 		$this->view('forum/forum_page', compact('matter', 'topics', 'course', 'forum', 'forum_posts'));
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