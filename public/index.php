<?php
header('Content-Type: text/html; charset=utf-8');

define('ROOT_DIR', '../');

define('PROJECT_ASSETS_DIR', ROOT_DIR.'/assets/');
define('PROJECT_CONTROLLERS_DIR', ROOT_DIR.'/src/controllers/');
define('PROJECT_MODELS_DIR', ROOT_DIR.'/src/models/');
define('PROJECT_VIEWS_DIR', ROOT_DIR.'/src/views/');

require ROOT_DIR.'/core/Autoload.php';

require_once ROOT_DIR.'/config/database.conf.php';
require_once ROOT_DIR.'/config/application.conf.php';

$bootstrap = new Core\Bootstrap();