<?php 
namespace Src\Models\DAO;

use Core\DAO;
use Src\Models\VO\Notice;

class NoticeDAO extends DAO
{
	public function delete($id){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			DELETE FROM notices
			WHERE id = ?");

		$stmt->bindParam(1, $id);

		$stmt->execute();

		return true;
	}
	
	public function save(Notice $notice){
		$connection = $this->getConnection();

		ini_set('default_charset', 'UTF-8');
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i:s');

		$notice->setCreationDate($date);

		$stmt = $connection->prepare("
			INSERT INTO notices(
				matter_id, user_id, creation_date, content, title
			) VALUES (?, ?, ?, ?, ?)");

		$matterId 		= $notice->getMatterId().'';
		$userId 		= $notice->getUserId().'';
		$creationDate 	= $notice->getCreationDate().'';
		$content		= $notice->getContent().'';
		$title 			= $notice->getTitle().'';

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
			FROM notices
			WHERE matter_id = ?");

		$stmt->bindParam(1, $matterId);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$result = $stmt->fetchAll();
			$notices = array();

			foreach ($result as $tuple) {
				$notice = new Notice();

				$notice->setId($tuple['id']);
				$notice->setUserId($tuple['user_id']);
				$notice->setMatterId($tuple['matter_id']);
				$notice->setCreationDate($tuple['creation_date']);
				$notice->setContent($tuple['content']);
				$notice->setTitle($tuple['title']);

				$notices[] = $notice;
			}
			return $notices;
		}
	}

}