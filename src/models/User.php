<?php

namespace Src\Models;

use Core\Model as MainModel;
use Core\Database;
use Core\DBConnection;
use \PDO;

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

	public function authenticateUser($userName, $password, PDO $connection){
		$stmt = $connection->prepare("
				SELECT * 
				FROM users
				WHERE user_name = ?
				AND password = ?
			");

		$stmt->bindParam(1, $userName);
		$stmt->bindParam(2, $password);

		$stmt->execute();

		if ($stmt->rowCount() == 1) {
			$result = $stmt->fetch();

			$this->setId($result['id']);
			$this->setCrationDate($result['creation_date']);
			$this->setName($result['name']);
			$this->setRegisterCode($result['register_code']);
			$this->setRole($result['role']);
			$this->setUserName($result['user_name']);

			return true;
		} else {
			return false;
		}
	}

	public function delete($id, PDO $connection){}

	public function save(PDO $connection){
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i:s');

		$this->setCrationDate($date);

		$stmt = $connection->prepare("
			INSERT INTO users(
				creation_date, name, password, register_code, role, user_name
			) VALUES (?, ?, ?, ?, ?, ?)");

		$creationDate 	= $this->getCreationDate().'';
		$name 			= $this->getName().'';
		$password 		= $this->getPassword().'';
		$registerCode 	= $this->getRegisterCode().'';
		$role 			= $this->getRole().'';
		$userName 		= $this->getUserName().'';

		$stmt->bindParam(1, $creationDate);
		$stmt->bindParam(2, $name);
		$stmt->bindParam(3, $password);
		$stmt->bindParam(4, $registerCode);
		$stmt->bindParam(5, $role);
		$stmt->bindParam(6, $userName);

		return $stmt->execute();
	}
	
	public function search($attribute, $value, PDO $connection){}

	public function select($id, PDO $connection){}

	public function selectAll(PDO $connection){}

	public function update($id, PDO $connection){}
	
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