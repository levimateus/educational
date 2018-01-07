<?php 
namespace Src\Models\DAO;

use Core\DAO;
use Src\Models\VO\User;

class UserDAO extends DAO
{
	public function authenticateUser($userName, $password){
		$connection = $this->getConnection();

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

			$user = new User();

			$user->setId($result['id']);
			$user->setCreationDate($result['creation_date']);
			$user->setName($result['name']);
			$user->setRegisterCode($result['register_code']);
			$user->setRole($result['role']);
			$user->setUserName($result['user_name']);

			return $user;
		} else {
			return false;
		}
	}
	

	public function delete($id){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			DELETE FROM users
			WHERE id = ?");

		$stmt->bindParam(1, $id);

		$stmt->execute();

		return true;
	}

	public function select($id){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM users
			WHERE id = ?");

		$stmt->bindParam(1, $id);

		$stmt->execute();

		if ($stmt->rowCount() == 1) {
			$result = $stmt->fetch();

			$user = new User();

			$user->setId($result['id']);
			$user->setCreationDate($result['creation_date']);
			$user->setName($result['name']);
			$user->setPassword($result['password']);
			$user->setRegisterCode($result['register_code']);
			$user->setRole($result['role']);
			$user->setUserName($result['user_name']);

			return $user;
		} else {
			return false;
		}
	}

	public function selectAll(){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM users");

		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

	public function save(User $user){
		$connection = $this->getConnection();

		ini_set('default_charset', 'UTF-8');
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i:s');

		$user->setCreationDate($date);

		$stmt = $connection->prepare("
			INSERT INTO users(
				creation_date, name, password, register_code, role, user_name
			) VALUES (?, ?, ?, ?, ?, ?)");

		$creationDate 	= $user->getCreationDate().'';
		$name 			= $user->getName().'';
		$password 		= $user->getPassword().'';
		$registerCode 	= $user->getRegisterCode().'';
		$role 			= $user->getRole().'';
		$userName 		= $user->getUserName().'';

		$stmt->bindParam(1, $creationDate);
		$stmt->bindParam(2, $name);
		$stmt->bindParam(3, $password);
		$stmt->bindParam(4, $registerCode);
		$stmt->bindParam(5, $role);
		$stmt->bindParam(6, $userName);

		return $stmt->execute();
	}
	public function search(User $model, $attribute, $value){}
	public function update(User $model, $id){}
}