<?php
spl_autoload_register(function($class){
	require_once(str_replace('\\', '/', $class.'.php'));
});

use Core\Bootstrap;

$bootstrap = new Bootstrap();