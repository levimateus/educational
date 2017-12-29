<?php

namespace Src\Models;

use Core\Model as MainModel;

class User extends MainModel
{
	private $name;
	private $age;

	public function setName($name){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setAge($age){
		$this->age = $age;
	}

	public function getAge(){
		return $this->age;
	}
}