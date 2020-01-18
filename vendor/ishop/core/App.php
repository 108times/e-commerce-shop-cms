<?php

namespace ishop;

class App
{
    public static $app;  // свойтство приложения для доступа к различным параметрам; контейнер для приложения
    public  function __construct()
    {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        session_start();
        @self::$app = Registry::instance(); // помещаю объект класса реестр в свойство $app
        $this->getParams();
        new ErrorHandler();
    }

    protected function getParams() // получает данные из конфигурационного фала 'params.php'
    {
        $params = require_once CONF . "/params.php";
        if (!empty($params)) {
            foreach ($params as $key => $value) {
                self::$app->setProperty($key, $value);
            }
        }
    }
}
