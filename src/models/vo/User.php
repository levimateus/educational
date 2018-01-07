<?php

namespace Src\Models\VO;

use Core\Model as MainModel;
use Core\Database;
use Core\DBConnection;
use \PDO;

class User extends MainModel
{
	private $id;
	private $creationDate;
	private $name;
	private $password;
	private $registerCode;
	private $role;
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

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getRegisterCode(){
		return $this->registerCode;
	}

	public function setRegisterCode($registerCode){
		$this->registerCode = $registerCode;
	}

	public function getRole(){
		return $this->role;
	}

	public function setRole($role){
		$this->role = $role;
	}

	public function getUserName(){
		return $this->userName;
	}

	public function setUserName($userName){
		$this->userName = $userName;
	}
}