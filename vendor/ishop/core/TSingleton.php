<?php

namespace ishop;

// паттерн синглтон
trait TSingleton
{
    protected static $instance; //образец

    public function Instance()
    {
        if (self::$instance === null){  //если нет образцов этого класса
            self::$instance = new self; //тогда помещаю образец этого класса в это свойство
        }
        return self::$instance;
    }

}