<?php 
namespace Src\Models\DAO;

use Core\DAO;
use Src\Models\VO\Lesson;

class LessonDao extends DAO
{
	public function delete(Lesson $model){}
	public function save(Lesson $model){}
	public function search(Lesson $model $attribute, $value){}
	public function selectOne(Lesson $model, $id){}
	public function selectMany(Lesson $model){}
	public function update(Lesson $model, $id){}
}