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
* @return Соединение с базой данных
*/
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
/**
* Метод создает подключение к базе данных
*
* @author Sergey
* @return Данные из таблицы по идендификатору
*/
    public static function findOneById($tableName, $id)
    { 
        $pdo = self::connect_db();
        $stmt = $pdo->prepare('SELECT * FROM ' . $tableName . ' WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
/**
* Метод создает подключение к базе данных
*
* @author Sergey
* @return Добавление данных в базу
*/
    public static function addTo_bd($tableName, $name, $description)
    {
        $pdo = self::connect_db();

        $stmt = $pdo->prepare('INSERT INTO ' . $tableName . ' (topic_name, description) VALUES (:name, :description)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
        if ($stmt) {
            return $pdo->lastInsertId();
        }else{
            return 0;
        }
    }
}