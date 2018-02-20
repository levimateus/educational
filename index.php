<?php
header('Content-Type: text/html; charset=utf-8');

require 'core/Autoload.php';
require 'vendor/autoload.php';
require_once 'src/config.php';

function buildUrl($url){
	$root = explode('/', $_SERVER['PHP_SELF']);
	$root = '/'.$root[1];
	$root = $root.$url;

	echo $root;
}

define('PROJECT_ASSETS_DIR', __DIR__.'/assets/');
define('PROJECT_CONTROLLERS_DIR', __DIR__.'/src/controllers/');
define('PROJECT_MODELS_DIR', __DIR__.'/src/models/');
define('PROJECT_VIEWS_DIR', __DIR__.'/src/views/');

$bootstrap = new Core\Bootstrap();