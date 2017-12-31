<?php 

namespace Src\Models;

use Core\Model as MainModel;

class Matter extends MainModel
{
	private $id;
	private $creationDate;
	private $halfyear; //1 or 2
	private $key;
	private $name;
	private $year;


	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getCreationDate(){
		return $this->creationDate;
	}

	public function setCrationDate($creationDate){
		$this->creationDate = $creationDate;
	}

	public function getHalfyear(){
		return $this->halfyear;
	}

	public function setHalfyear($halfyear){
		$this->halfyear = $halfyear;
	}

	public function getKey(){
		return $this->key;
	}

	public function setKey($key){
		$this->key = $key;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getYear(){
		return $this->year;
	}

	public function setYear($year){
		$this->year = $year;
	}

}