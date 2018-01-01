<?php

namespace Core;

use Core\DBConnection;
use \PDO;

interface Database
{
	public function selectAll(PDO $connection);
	public function delete($id, PDO $connection);
	public function select($id, PDO $connection);
	public function save(PDO $connection);
	public function search($attribute, $value, PDO $connection);
	public function update($id, PDO $connection);
}