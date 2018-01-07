<?php

namespace Src\Models\VO;

use Core\Model as MainModel;

class Lesson extends MainModel
{
	private $id;
	private $creationDate;
	private $description;
	private $title;

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
		$this->creationDate = $crationDate;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setDescriptionk($description){
		$this->description = $description;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}
}