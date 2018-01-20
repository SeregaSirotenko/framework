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
    private static function connect_db()
    {
        $config = include '/config/db.php';
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db'];
        $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
       return new PDO($dsn, $config['user'], $config['pass'], $opt);
    }
/**
* Метод создает подключение к базе данных
*
* @author Sergey
* @return Все данные из таблицы
*/
    public static function findAll($tableName)
    {
        $pdo = self::connect_db();
        return $pdo->query('SELECT * FROM ' . $tableName)->fetchAll(PDO::FETCH_ASSOC);
    }
    public static function findOneById($tableName, $id)
    { 
        $pdo = self::connect_db();
        $res = 'SELECT * FROM ' . $tableName . ' WHERE id=' . $id;
        return $pdo->query($res)->fetch(PDO::FETCH_ASSOC);
    }
}