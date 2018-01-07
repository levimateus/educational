<?php 
namespace Src\Models\DAO;

use Core\DAO;
use Src\Models\VO\Topic;

class TopicDAO extends DAO
{
	public function selectAll(Topic $model){}
	public function delete(Topic $model){}
	public function select(Topic $model, $id){}
	public function save(Topic $model){}
	public function search(Topic $model $attribute, $value){}
	public function update(Topic $model, $id){}
}