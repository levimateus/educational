<?php 

namespace Src\Models;

use Core\Model as MainModel;

class Topic extends MainModel
{
	private $id;
	private $content;
	private $creationDate;
	private $title;

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
		return $this->crationDate;
	}

	public function setCreationDate($creationDate){
		$this->crationDate = $creationDate;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}
}