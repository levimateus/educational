<?php 
namespace Src\Models\DAO;

use Core\DAO;
use Src\Models\VO\ForumPost;

class ForumPostDAO extends DAO
{
	public function selectByForum($forumId){
		$connection = $this->getConnection();

		$stmt = $connection->prepare("
			SELECT *
			FROM forum_posts
			WHERE forum_id = ?");

		$stmt->bindParam(1, $forumId);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			$result = $stmt->fetchAll();
			$forums = array();

			foreach ($result as $tuple) {
				$forum = new Forum();

				$forum->setId($tuple['id']);
				$forum->setContent($tuple['content']);
				$forum->setForumId($tuple['forum_id']);
				$forum->setUserId($tuple['user_id']);
				$forum->setPostId($tuple['post_id']);
				$forum->setCreationDate($tuple['creation_date']);

				$forums[] = $forum;
			}
			return $forums;
		}
	}
}