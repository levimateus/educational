<?php
header('Content-Type: text/html; charset=utf-8');

require 'core/Autoload.php';
require_once 'config/config.php';

function buildUrl($url){
	echo $url;
}

define('PROJECT_ASSETS_DIR', __DIR__.'/assets/');
define('PROJECT_CONTROLLERS_DIR', __DIR__.'/src/controllers/');
define('PROJECT_MODELS_DIR', __DIR__.'/src/models/');
define('PROJECT_VIEWS_DIR', __DIR__.'/src/views/');

//USER LEVELS
define('PROJECT_STUDENT', 0);
define('PROJECT_ADMIN', 2);
define('PROJECT_TEACHER', 1);

$bootstrap = new Core\Bootstrap();