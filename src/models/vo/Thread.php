<?php 

namespace Src\Models\VO;

use Core\Model as MainModel;

class Thread extends MainModel
{
	private $id;
	private $title;
	private $content;
	private $userId;
	private $matterId;
	private $creationDate;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getContent(){
		return $this->content;
	}

	public function setContent($content){
		$this->content = $content;
	}

	public function getUserId(){
		return $this->userId;
	}

	public function setUserId($userId){
		$this->userId = $userId;
	}

	public function getMatterId(){
		return $this->matterId;
	}

	public function setMatterId($matterId){
		$this->matterId = $matterId;
	}

	public function getCreationDate(){
		return $this->creationDate;
	}

	public function setCreationDate($creationDate){
		$this->creationDate = $creationDate;
	}
}