<?php

namespace system;

class App
{
    public static $defaultNamespace = 'controllers\\';
    private static function route()
    {
        $url = $_SERVER['REQUEST_URI'];
        $path = parse_url($url, PHP_URL_PATH);
        $parts = explode('/', $path);
        $controller = $parts[1];
        $action = $parts[2];
        $finalController = self::$defaultNamespace . $controller . 'Controller';
        $finalAction = 'action' . ucfirst($action);
        $objController = new $finalController;
        if (!method_exists($objController, $finalAction)) {
            throw new \Exception('Данного метода не существует!');  
        }
        $objController->$finalAction();
    }
    public static function run()
    {
        header('Content-Type: text/html; charset=utf-8');
        self::route();       
    }
}