<?php 
namespace Src\Models\DAO;

use Core\DAO;
use Src\Models\VO\Topic;

class TopicDAO extends DAO
{
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
		$title 		= $topic->getTitle().'';

		$stmt->bindParam(1, $matterId);
		$stmt->bindParam(2, $userId);
		$stmt->bindParam(3, $creationDate);
		$stmt->bindParam(4, $content);
		$stmt->bindParam(5, $title);

		return $stmt->execute();
	}
}