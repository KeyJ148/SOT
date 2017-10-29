<?php

/**
 * Настройки путей
 */
//Доменное имя приложения
define('DOMAIN_SERVER', 'http://' . $_SERVER['HTTP_HOST']);
//Папка с классами, описывающими методы API
define('METHODS_FOLDER', ROOT_FOLDER . 'methods/');
//Префикс для классов описывающих методы API
define('METHODS_PREFIX', 'M_');

/**
 * Настройки базы данных
 */
//Хост базы данных
define('DB_HOST', 'localhost');
//Логин базы данных
define('DB_LOGIN', 'root');
//Пароль базы данных
define('DB_PASSWORD', '123456');
//Название базы данных
define('DB_NAME', 'wikisot');