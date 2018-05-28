<?php 

namespace Src\Models\VO;

use Core\Model as MainModel;

class ForumPost extends MainModel
{
	private $id;
	private $content;
	private $forumId;
	private $userId;
	private $postId;
	private $creationDate;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getContent(){
		return $this->content;
	}

	public function setContent($content){
		$this->content = $content;
	}

	public function getForumId(){
		return $this->forumId;
	}

	public function setForumId($forumId){
		$this->forumId = $forumId;
	}

	public function getUserId(){
		return $this->userId;
	}

	public function setUserId($userId){
		$this->userId = $userId;
	}

	public function getPostId(){
		return $this->postId;
	}

	public function setPostId($postId){
		$this->postId = $postId;
	}

	public function getCreationDate(){
		return $this->creationDate;
	}

	public function setCreationDate($creationDate){
		$this->creationDate = $creationDate;
	}
}