<?php

namespace ishop;


class ErrorHandler
{

    public function __construct(){
        if (DEBUG) {
            error_reporting(-1); // если находимся в режиме разработки то показывать все ошибки
        }
        else{
            error_reporting(0); // в противном случае не показывать ошибки
        }
        set_exception_handler([$this,'exceptionHandler']);
    }

    public function exceptionHandler($e){
        $this->logErrors($e->getMessage(),$e->getFile(), $e->getLine());
        $this->displayError('Исключение',$e->getMessage(),$e->getFile(), $e->getLine(),$e->getCode());
    }

    public function logErrors($message = "", $file = "", $line = "") {
        error_log("[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file} 
        | Строка: {$line} \n==================\n",3, ROOT . '/tmp/errors.log' );
    }

    public function displayError($errno, $errstr, $errfile, $errline, $response = 404) {
        http_response_code($response); // отправит тот код, который передан параметром $response
        if($response == 404 & !DEBUG ){ // если код ошибки 404 и отладка выключена
            require WWW . '/errors/404.php';
            die;
        }
        if (DEBUG){
            require WWW . '/errors/development.php';
        } else {
            require WWW . '/errors/production.php';
        }
        die;
    }
}