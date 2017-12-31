<?php
header('Content-Type: text/html; charset=utf-8');

require 'vendor/autoload.php';
require_once 'src/config.php';

define('PROJECT_ASSETS_DIR', __DIR__.'/assets/');
define('PROJECT_CONTROLLERS_DIR', __DIR__.'/src/controllers/');
define('PROJECT_MODELS_DIR', __DIR__.'/src/models/');
define('PROJECT_VIEWS_DIR', __DIR__.'/src/views/');

spl_autoload_register(function($class){
	require_once(str_replace('\\', '/', $class.'.php'));
});

$bootstrap = new Core\Bootstrap();