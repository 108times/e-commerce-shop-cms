<?php

namespace ishop;


class Router
{

    protected static $routes = []; // таблица маршрутов
    protected static $route = []; // текущий маршрут

    public static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes() {
        return self::$routes;
    }

    public static function getRoute() {
        return self::$route;
    }
}