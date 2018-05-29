<?php 
namespace Src\Controllers;

use Core\Controller as MainController;
use Src\Models\VO\Thread;
use Src\Models\DAO\ThreadDAO;
use Src\Models\DAO\AnswerDAO;
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
 		$threadDAO  = new ThreadDAO();
 		$matterDAO = new MatterDAO();
 		$topicDAO  = new TopicDAO();

 		$threads = $threadDAO->selectByMatter($id);

 		$topics = $topicDAO->selectByMatter($id);
 		$matter = $matterDAO->selectOne($id);
 		$course = $courseDAO->selectOne($matter->getCourseId());

 		$this->view('forum/threads_list', compact('matter', 'topics', 'course', 'threads'));

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

 			$thread = new Thread();

	 		$thread->setMatterId($_POST['matter_id']);
			$thread->setUserId($_SESSION['user']['id']);
			$thread->setTitle($_POST['title']);
			$thread->setContent($_POST['content']);

			$threadDAO = new ThreadDAO();

			if ($threadDAO->save($thread)) {
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

 		$threadDAO  = new ThreadDAO();
 		$answerDAO = new AnswerDAO();
 		$matterDAO = new MatterDAO();
 		$topicDAO  = new TopicDAO();
 		$courseDAO = new CourseDAO();

 		$thread  = $threadDAO->selectOne($id);
 		$answers = $answerDAO->selectByThread($id);
 		$matter  = $matterDAO->selectOne($thread->getMatterId());
 		$topics  = $topicDAO->selectByMatter($matter->getId());
 		$course  = $courseDAO->selectOne($matter->getCourseId());

 		$this->view('forum/thread_page', compact('matter', 'topics', 'course', 'thread', 'answers'));
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