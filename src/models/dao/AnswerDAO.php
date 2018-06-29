<?php 
namespace Src\Models\DAO;

use Core\DAO;
use Src\Models\VO\Answer;

class AnswerDAO extends DAO
{
	public function save(Answer $answer){
		$connection = $this->getConnection();

		ini_set('default_charset', 'UTF-8');
		date_default_timezone_set('America/Sao_Paulo');
		$date = date('Y-m-d H:i:s');

		$answer->setCreationDate($date);

		$content 		= $answer->getContent().'';
		$creationDate 	= $answer->getCreationDate().'';
		$userId 		= $answer->getUserId().'';
		$threadId 		= $answer->getThreadId().'';
		$answerId   	= $answer->getAnswerId().'';

		$stmt = $connection->prepare("
			INSERT INTO answers(
				content, creation_date, user_id, thread_id
			) VALUES (?, ?, ?, ?)");

		$stmt->bindParam(1, $content);
		$stmt->bindParam(2, $creationDate);
		$stmt->bindParam(3, $userId);
		$stmt->bindParam(4, $threadId);

		return $stmt->execute();
	}

	public function selectOne($id){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM answers
			WHERE id = ?");

		$stmt->bindParam(1, $id);
		$stmt->execute();

		if ($stmt->rowCount() == 1) {
			$result = $stmt->fetch();
			$answer = new Answer();

			$answer->setId($result['id']);
			$answer->setAnswerId($result['answer_id']);
			$answer->setContent($result['content']);
			$answer->setUserId($result['user_id']);
			$answer->setThreadId($result['thread_id']);
			$answer->setCreationDate($result['creation_date']);
			return $answer;
		} else {
			return false;
		}
	}

	public function selectByThread($threadId){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM answers
			WHERE thread_id = ?");

		$stmt->bindParam(1, $threadId);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$result = $stmt->fetchAll();
			$answers = array();

			foreach ($result as $tuple) {
				$answer = new Answer();

				$answer->setId($tuple['id']);
				$answer->setUserId($tuple['user_id']);
				$answer->setThreadId($tuple['thread_id']);
				$answer->setCreationDate($tuple['creation_date']);
				$answer->setContent($tuple['content']);
				$answer->setAnswerId($tuple['answer_id']);

				$answers[] = $answer;
			}
			return $answers;
		}
	}

	public function delete($id){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			DELETE 
			FROM answers 
			WHERE id = ?");

		$stmt->bindParam(1, $id);
		$stmt->execute();

		return true;
	}
}