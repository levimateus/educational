<?php 

namespace Src\Models\VO;

use Core\Model as MainModel;

class Course extends MainModel
{
	private $id;
	private $creationDate;
	private $description;
	private $name;
	private $userId;

	private $userName;


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

	public function getDescription(){
		return $this->description;
	}

	public function setDescription($description){
		$this->description = $description;
	}
	
	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getUserId(){
		return $this->userId;
	}

	public function setUserId($userId){
		$this->userId = $userId;
	}

	public function getUserName(){
		return $this->userName;
	}

	public function setUserName($userName){
		$this->userName = $userName;
	}

}