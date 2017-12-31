<?php

namespace Core;

use Core\DBConnection;

interface Database
{
	public function selectAll(DBConnection $connection);
	public function delete($id, DBConnection $connection);
	public function select($id, DBConnection $connection);
	public function save(DBConnection $connection);
	public function search($attribute, $value, DBConnection $connection);
	public function update($id, DBConnection $connection);
}