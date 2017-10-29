<?php

//Корневая папка
define('ROOT_FOLDER', $_SERVER['DOCUMENT_ROOT'] . '/');

require_once ROOT_FOLDER.'core/init/config.php';
require_once ROOT_FOLDER.'core/init/functions.php';

$router = new Router();
$router->route();
$router->answer->display();