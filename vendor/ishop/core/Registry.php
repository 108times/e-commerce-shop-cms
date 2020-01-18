<?php

namespace ishop;

class Registry
{
    use TSingleton;

    protected static $properties = [];  // массив свойтств

    public function setProperty($name, $value) {
        self::$properties[$name] = $value;  // создает или меняет свойство
    }

    public function getProperty($name) {
        if (isset(self::$properties[$name])){
            return self::$properties[$name];  // если свойство существует, возвращает его
        }
        return null;
    }

    public function getProperties() {
        return self::$properties;   // распечатывает массив свойств
    }
}