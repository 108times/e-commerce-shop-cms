<?php

define("DEBUG", 1); //режим разработки(0,1)
define("ROOT", dirname(__DIR__)); //корень сайта
define("WWW",ROOT . '/public'); //публичная папка
define("APP",ROOT . '/app'); //папка приложения
define("CORE",ROOT . '/vendor/ishop/core'); //ядро, классы ядра
define("LIBS",ROOT . '/vendor/ishop/core/libs'); //библиотеки
define("CACHE",ROOT . '/tmp/cache'); //кэш
define("CONF",ROOT . '/config'); //конифигурационные файлы
define("LAYOUT", 'default'); //шаблон сайта по умолчанию

//http://onlineshop/public/index.php
$app_path = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}";
//http://onlineshop/public/
$app_path = preg_replace("#[^/]+$#", '',$app_path);
//http://onlineshop
$app_path = str_replace('/public/','',$app_path);

define("PATH",$app_path); //url главной страницы
define("ADMIN", PATH . '/admin'); //админка сайта

require_once ROOT . '/vendor/autoload.php'; //подключение автозагрузчика composer
