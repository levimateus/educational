<?php
header('Content-Type: text/html; charset=utf-8');

require 'core/Autoload.php';
require_once 'src/config.php';

function buildUrl($url){
	echo $url;
}

define('PROJECT_ASSETS_DIR', __DIR__.'/assets/');
define('PROJECT_CONTROLLERS_DIR', __DIR__.'/src/controllers/');
define('PROJECT_MODELS_DIR', __DIR__.'/src/models/');
define('PROJECT_VIEWS_DIR', __DIR__.'/src/views/');

$bootstrap = new Core\Bootstrap();