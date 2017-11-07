<?php

namespace system;
/**
* Данный класс является главным и запускает само приложение в точке входа
*
* @author Sergey
*/
class App
{
    public static $defaultNamespace = 'controllers\\';
/**
* Метод вызывает действие у контроллера
*
* @author Sergey
* @throws Данного метода не существует
*/
    private static function route()
    {
        // Записываем в переменную $url из адресной строки 
        $url = $_SERVER['REQUEST_URI'];
        // В переменную $path записываем только запрос
        $path = parse_url($url, PHP_URL_PATH);
        // Разбиваем запрос на части и записываем в переменную $parts
        $parts = explode('/', $path);
        // В переменную $controller записывается 1 эллемент массива
        $controller = $parts[1];
        // В переменную $action записывается 2 эллемент массива
        $action = $parts[2];
        // Создаем контроллер
        $finalController = self::$defaultNamespace . $controller . 'Controller';
        // Создаем действие контроллера
        $finalAction = 'action' . ucfirst($action);
        // Проверяем наличие класса
        if (!class_exists($finalController)) {
            throw new \Exception('Данного класса не существует');   
        }
        // Присваеваем экземпляр класса нашего контроллера
        $objController = new $finalController;
        // Проверяем наличие метода
        if (!method_exists($objController, $finalAction)) {
            throw new \Exception('Данного метода не существует!');  
        }
        // Вызываем действие у контроллера
        $objController->$finalAction();
    }
/**
* Метод отправляет заголовок с кодировкой и вызывает метод route
*
* @author Sergey
*/
    public static function run()
    {
        // Отпраляем заголовок
        header('Content-Type: text/html; charset=utf-8');
        // Вызываем метод route
        self::route();       
    }
}