<?php

namespace core\classes;
use PDO;
/**
* Данный класс создает подключение к базе данных mysql
*
* @author Sergey
*/
class SystemDatabase
{
/**
* Метод создает подключение к базе данных
*
* @author Sergey
* @return Все данные из таблицы
*/
    public static function findAll($tableName)
    {
        $config = include '/config/db.php';
        $dsn = 'mysql:host=' . $host . ';dbname=' . $db;
        $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
        $pdo = new PDO($dsn, $user, $pass, $opt);

        return $data = $pdo->query('SELECT * FROM ' . $tableName)->fetchAll(PDO::FETCH_ASSOC);
    }
}