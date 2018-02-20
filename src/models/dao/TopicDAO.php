<?php 
namespace Src\Models\DAO;

use Core\DAO;
use Src\Models\VO\Topic;

class TopicDAO extends DAO
{
	public function delete($id){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			DELETE FROM topics
			WHERE id = ?");

		$stmt->bindParam(1, $id);

		$stmt->execute();

		return true;
	}
	
	public function save(Topic $topic){
		$connection = $this->getConnection();

		ini_set('default_charset', 'UTF-8');
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i:s');

		$topic->setCreationDate($date);

		$stmt = $connection->prepare("
			INSERT INTO topics(
				matter_id, user_id, creation_date, content, title
			) VALUES (?, ?, ?, ?, ?)");

		$matterId 		= $topic->getMatterId().'';
		$userId 		= $topic->getUserId().'';
		$creationDate 	= $topic->getCreationDate().'';
		$content		= $topic->getContent().'';
		$title 			= $topic->getTitle().'';

		$stmt->bindParam(1, $matterId);
		$stmt->bindParam(2, $userId);
		$stmt->bindParam(3, $creationDate);
		$stmt->bindParam(4, $content);
		$stmt->bindParam(5, $title);

		return $stmt->execute();
	}

	public function selectByMatter($matterId){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM topics
			WHERE matter_id = ?");

		$stmt->bindParam(1, $matterId);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$result = $stmt->fetchAll();
			$topics = array();

			foreach ($result as $tuple) {
				$topic = new Topic();

				$topic->setId($tuple['id']);
				$topic->setUserId($tuple['user_id']);
				$topic->setMatterId($tuple['matter_id']);
				$topic->setCreationDate($tuple['creation_date']);
				$topic->setContent($tuple['content']);
				$topic->setTitle($tuple['title']);

				$topics[] = $topic;
			}
			return $topics;
		}
	}

}