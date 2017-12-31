<?php

namespace Src\Models;

use Core\Model as MainModel;
use Core\Database;
use Core\DBConnection;

define('PROJECT_STUDENT', 0);
define('PROJECT_TEACHER', 1);
define('PROJECT_ADMIN', 2);

class User extends MainModel implements Database
{
	private $id;
	private $creationDate;
	private $name;
	private $password;
	private $registerCode;
	private $role;
	private $userName;

	public function selectAll(DBConnection $connection){}
	public function delete($id, DBConnection $connection){}
	public function select($id, DBConnection $connection){}
	public function save(DBConnection $connection){}
	public function search($attribute, $value, DBConnection $connection){}
	public function update($id, DBConnection $connection){}

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