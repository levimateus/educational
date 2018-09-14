<?php 
namespace Src\Models\VO;

use Core\Model as MainModel;

class Matter extends MainModel
{
	private $id;
	private $creationDate;
	private $title;
	private $description;
	private $topicId;
	private $userId;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getCreationDate(){
		return $this->creationDate;
	}

	public function setCreationDate($creationDate){
		$this->creationDate = $creationDate;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}
}