<?php

spl_autoload_register(function($class){
	$fields = explode('\\', $class);

	for ($index = 0; $index < (count($fields) - 1); $index++){
		$fields[$index] = strtolower($fields[$index]);
	}

	end($fields);	
	$fields[key($fields)] = ucfirst(end($fields));
	
	$path = implode('/', $fields);

	require $path.'.php';
});