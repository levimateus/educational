<?php 
namespace Src\Models\DAO;

use Core\DAO;
use Src\Models\VO\Forum;

class ForumDAO extends DAO
{
	public function save(Forum $forum){
		$connection = $this->getConnection();

		ini_set('default_charset', 'UTF-8');
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i:s');

		$forum->setCreationDate($date);

		$stmt = $connection->prepare("
			INSERT INTO forums(
				matter_id, user_id, creation_date, description, title
			) VALUES (?, ?, ?, ?, ?)");

		$matterId 		= $forum->getMatterId().'';
		$userId 		= $forum->getUserId().'';
		$creationDate 	= $forum->getCreationDate().'';
		$description	= $forum->getDescription().'';
		$title 			= $forum->getTitle().'';

		$stmt->bindParam(1, $matterId);
		$stmt->bindParam(2, $userId);
		$stmt->bindParam(3, $creationDate);
		$stmt->bindParam(4, $description);
		$stmt->bindParam(5, $title);

		return $stmt->execute();
	}

	public function selectOne($id){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM forums
			WHERE id = ?");

		$stmt->bindParam(1, $id);
		$stmt->execute();

		if ($stmt->rowCount() == 1) {
			$result = $stmt->fetch();
			$forum = new Forum();

			$forum->setId($result['id']);
			$forum->setTitle($result['title']);
			$forum->setDescription($result['description']);
			$forum->setUserId($result['user_id']);
			$forum->setMatterId($result['matter_id']);
			$forum->setCreationDate($result['creation_date']);
			return $forum;
		} else {
			return false;
		}
	}

	public function selectByMatter($matterId){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM forums
			WHERE matter_id = ?");

		$stmt->bindParam(1, $matterId);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$result = $stmt->fetchAll();
			$forums = array();

			foreach ($result as $tuple) {
				$forum = new Forum();

				$forum->setId($tuple['id']);
				$forum->setUserId($tuple['user_id']);
				$forum->setMatterId($tuple['matter_id']);
				$forum->setCreationDate($tuple['creation_date']);
				$forum->setDescription($tuple['description']);
				$forum->setTitle($tuple['title']);

				$forums[] = $forum;
			}
			return $forums;
		}
	}
}