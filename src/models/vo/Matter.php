<?php 

namespace Src\Models\VO;

use Core\Model as MainModel;

class Matter extends MainModel
{
	private $id;
	private $creationDate;
	private $description;
	private $halfyear; //1 or 2
	private $key;
	private $name;
	private $year;
	private $courseId;
	private $userId;

	private $courseName;
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

	public function getCourseId(){
		return $this->courseId;
	}

	public function setCourseId($id){
		$this->courseId = $id;
	}

	public function getUserId(){
		return $this->userId;
	}

	public function setUserId($id){
		$this->userId = $id;
	}

	public function getCourseName(){
		return $this->courseName;
	}

	public function setCourseName($courseName){
		$this->courseName = $courseName;
	}

	public function getUserName(){
		return $this->userName;
	}

	public function setUserName($userName){
		$this->userName = $userName;
	}

}