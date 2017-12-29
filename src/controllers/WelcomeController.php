<?php 
namespace Src\Controllers;

use Core\Controller as MainController;
use Src\Models\User;

 class WelcomeController extends MainController
 {
 	function index(){
		self::view('welcome');
 	}

 	function redirecionar(){
 		self::redirect('/funcionou');
 	}

 	function funcionou(){
 		$user = new User();
 		$user->setName('Mateus');
 		$user->setAge('20');

 		$name = $user->getName();
 		$age = $user->getAge();

 		echo "<br>Name: ".$name;
 		echo "<br>Age: ".$age;
 	}
 }