<?php 

namespace Src\Models;

use Core\Model as MainModel;

class Course extends MainModel
{
	private $id;
	private $creationDate;
	private $name;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getCreationDate(){
		return $this->creationDate;
	}

	public function setCrationDate($name){
		$this->creationDate = $creationDate;
	}
	
	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}


}