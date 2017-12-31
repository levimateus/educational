<?php
namespace Src\Tests;

use PHPUnit\Framework\TestCase as MainTest;

use \Core\Autoload;

final class UserTest extends MainTest
{
	public function test_register_new_student_user(){
		$user = new \Src\Models\User();

		$user->setName('José da Silva');
		$user->setRegisterCode('1234567');
		$user->setUserName('jose1234567');
		$user->setPassword(md5('password'));
		$user->setRole(PROJECT_STUDENT);

		$this->assertTrue($user->add());
	}
}