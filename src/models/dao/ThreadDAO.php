<?php 
namespace Src\Models\DAO;

use Core\DAO;
use Src\Models\VO\Thread;

class ThreadDAO extends DAO
{
	public function delete($id){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			DELETE FROM threads, answers
			USING threads, answers
			WHERE threads.id = ? OR answers.thread_id = ?");

		$stmt->bindParam(1, $id);
		$stmt->bindParam(2, $id);
		$stmt->execute();

		return true;
	}
	public function save(Thread $thread){
		$connection = $this->getConnection();

		ini_set('default_charset', 'UTF-8');
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i:s');

		$thread->setCreationDate($date);

		$stmt = $connection->prepare("
			INSERT INTO threads(
				matter_id, user_id, creation_date, content, title
			) VALUES (?, ?, ?, ?, ?)");

		$matterId 		= $thread->getMatterId().'';
		$userId 		= $thread->getUserId().'';
		$creationDate 	= $thread->getCreationDate().'';
		$content		= $thread->getContent().'';
		$title 			= $thread->getTitle().'';

		$stmt->bindParam(1, $matterId);
		$stmt->bindParam(2, $userId);
		$stmt->bindParam(3, $creationDate);
		$stmt->bindParam(4, $content);
		$stmt->bindParam(5, $title);

		return $stmt->execute();
	}

	public function selectOne($id){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM threads
			WHERE id = ?");

		$stmt->bindParam(1, $id);
		$stmt->execute();

		if ($stmt->rowCount() == 1) {
			$result = $stmt->fetch();
			$thread = new Thread();

			$thread->setId($result['id']);
			$thread->setTitle($result['title']);
			$thread->setContent($result['content']);
			$thread->setUserId($result['user_id']);
			$thread->setMatterId($result['matter_id']);
			$thread->setCreationDate($result['creation_date']);
			return $thread;
		} else {
			return false;
		}
	}

	public function selectByMatter($matterId){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM threads
			WHERE matter_id = ?");

		$stmt->bindParam(1, $matterId);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$result = $stmt->fetchAll();
			$threads = array();

			foreach ($result as $tuple) {
				$thread = new Thread();

				$thread->setId($tuple['id']);
				$thread->setUserId($tuple['user_id']);
				$thread->setMatterId($tuple['matter_id']);
				$thread->setCreationDate($tuple['creation_date']);
				$thread->setContent($tuple['content']);
				$thread->setTitle($tuple['title']);

				$threads[] = $thread;
			}
			return $threads;
		}
	}
}