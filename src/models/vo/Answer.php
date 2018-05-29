<?php 

namespace Src\Models\VO;

use Core\Model as MainModel;

class Answer extends MainModel
{
	private $id;
	private $content;
	private $creationDate;
	private $userId;
	private $threadId;
	private $answerId;

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

	public function getCreationDate(){
		return $this->creationDate;
	}

	public function setCreationDate($creationDate){
		$this->creationDate = $creationDate;
	}

	public function getUserId(){
		return $this->userId;
	}

	public function setUserId($userId){
		$this->userId = $userId;
	}

	public function getThreadId(){
		return $this->threadId;
	}

	public function setThreadId($threadId){
		$this->threadId = $threadId;
	}

	public function getAnswerId(){
		return $this->answerId;
	}

	public function setAnswerId($answerId){
		$this->answerId = $answerId;
	}
}