<?php 
namespace Src\Models\DAO;

use Core\DAO;
use Src\Models\VO\Matter;

class MatterDAO extends DAO
{
	public function delete(Matter $model){}
	public function save(Matter $matter){
		$connection = $this->getConnection();

		ini_set('default_charset', 'UTF-8');
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i:s');

		$matter->setCreationDate($date);

		$stmt = $connection->prepare("
			INSERT INTO matters(
				course_id, user_id, creation_date, matter_year, halfyear, name, description, matter_key
			) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

		$courseId 		= $matter->getCourseId().'';
		$userId 		= $matter->getUserId().'';
		$creationDate 	= $matter->getCreationDate().'';
		$year 			= $matter->getYear().'';
		$halfyear 		= $matter->getHalfyear().'';
		$name 			= $matter->getName().'';
		$description 	= $matter->getDescription().'';
		$key 			= $matter->getKey().'';

		$stmt->bindParam(1, $courseId);
		$stmt->bindParam(2, $userId);
		$stmt->bindParam(3, $creationDate);
		$stmt->bindParam(4, $year);
		$stmt->bindParam(5, $halfyear);
		$stmt->bindParam(6, $name);
		$stmt->bindParam(7, $description);
		$stmt->bindParam(8, $key);

		return $stmt->execute();
	}

	public function selectOne($id){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM matters
			WHERE id = ?");

		$stmt->bindParam(1, $id);
		$stmt->execute();

		if ($stmt->rowCount() == 1) {
			$result = $stmt->fetch();
			$matter = new Matter();

			$matter->setId($result['id']);
			$matter->setCreationDate($result['creation_date']);
			$matter->setDescription($result['description']);
			$matter->setHalfyear($result['halfyear']);
			$matter->setKey($result['matter_key']);
			$matter->setName($result['name']);
			$matter->setYear($result['matter_year']);
			$matter->setCourseId($result['course_id']);
			$matter->setUserId($result['user_id']);

			return $matter;
		} else {
			return false;
		}
	}

	public function selectByCourse($courseId){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT matters.*, users.name AS user_name
			FROM matters
			LEFT JOIN users
			ON users.id = matters.user_id
			WHERE matters.course_id = ?");

		$stmt->bindParam(1, $courseId);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$result = $stmt->fetchAll();
			$matters = array();

			foreach ($result as $tuple) {
				$matter = new Matter();

				$matter->setId($tuple['id']);
				$matter->setCreationDate($tuple['creation_date']);
				$matter->setDescription($tuple['description']);
				$matter->setHalfyear($tuple['halfyear']);
				$matter->setKey($tuple['matter_key']);
				$matter->setName($tuple['name']);
				$matter->setYear($tuple['matter_year']);
				$matter->setCourseId($tuple['course_id']);
				$matter->setUserId($tuple['user_id']);
				$matter->setUserName($tuple['user_name']);

				$matters[] = $matter;
			}
			return $matters;
		}
	}

	public function selectByUser($userId){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT matters.*, course.name AS course_name
			FROM matters
			LEFT JOIN courses
			ON courses.id = matters.course_id
			WHERE matters.user_id = ?");

		$stmt->bindParam(1, $userId);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$matters = array();
			$result = $stmt->fetchAll();

			foreach ($result as $tuple) {
				$matter = new Matter();

				$matter->setId($tuple['id']);
				$matter->setCreationDate($tuple['creation_date']);
				$matter->setDescription($tuple['description']);
				$matter->setHalfyear($tuple['halfyear']);
				$matter->setKey($tuple['matter_key']);
				$matter->setName($tuple['name']);
				$matter->setYear($tuple['matter_year']);
				$matter->setCourseId($tuple['course_id']);
				$matter->setUserId($tuple['user_id']);

				$matters[] = $matter;
			}
			return $matters;
		}
	}

	public function selectByCourseAndUser($userId, $courseId){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM matters
			WHERE user_id = ?
			AND course_id = ?");

		$stmt->bindParam(1, $userId);
		$stmt->bindParam(2, $courseId);
		$stmt->execute();

		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$matters = array();
			$result = $stmt->fetchAll();

			foreach ($result as $tuple) {
				$matter = new Matter();

				$matter->setId($tuple['id']);
				$matter->setCreationDate($tuple['creation_date']);
				$matter->setDescription($tuple['description']);
				$matter->setHalfyear($tuple['halfyear']);
				$matter->setKey($tuple['matter_key']);
				$matter->setName($tuple['name']);
				$matter->setYear($tuple['matter_year']);
				$matter->setCourseId($tuple['course_id']);
				$matter->setUserId($tuple['user_id']);

				$matters[] = $matter;
			}
			return $matters;
		}
	}

	public function search(Matter $model, $attribute, $value){}
	public function selectMany(Matter $model){}
	public function update(Matter $model, $id){}
}