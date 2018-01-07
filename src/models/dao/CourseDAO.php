<?php 
namespace Src\Models\DAO;

use Core\DAO;
use Core\DBCOnnection;
use Src\Models\VO\Course;

class CourseDao extends DAO
{

	public function delete(DBConnection $dbConnection, Course $course){}

	public function save(Course $course){
		$connection = $this->getConnection();

		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i:s');

		$course->setCreationDate($date);

		$stmt = $connection->prepare("
			INSERT INTO courses(
				creation_date, name, description, user_id
			) VALUES (?, ?, ?, ?)");

		$creationDate 	= $course->getCreationDate().'';
		$name 			= $course->getName().'';
		$description 		= $course->getDescription().'';
		$userId 	= $course->getUserId().'';

		$stmt->bindParam(1, $creationDate);
		$stmt->bindParam(2, $name);
		$stmt->bindParam(3, $description);
		$stmt->bindParam(4, $userId);

		return $stmt->execute();
	}

	public function search(DBConnection $dbConnection, Course $course, $attribute, $value){}

	public function selectOne($id){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM courses
			WHERE id = ?");

		$stmt->bindParam(1, $id);
		$stmt->execute();

		if ($stmt->rowCount() == 1) {
			$result = $stmt->fetch();

			$course = new Course();

			$course->setId($result['id']);
			$course->setCreationDate($result['creation_date']);
			$course->setName($result['name']);
			$course->setDescription($result['description']);
			$course->setUserId($result['user_id']);

			return $course;
		} else {
			return false;
		}
	}
	public function selectByUser($value){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM courses
			WHERE user_id = :value
			ORDER BY name");

		$stmt->bindValue(':value', $value);

		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}

	public function selectAll(){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM courses
			ORDER BY name");

		$stmt->execute();

		$result = $stmt->fetchAll();

		return $result;
	}
	
	public function update(DBConnection $dbConnection, Course $course, $id){}
}