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
    private static function connectDb()
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
        $pdo = self::connectDb();
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
        $pdo = self::connectDb();
        $stmt = $pdo->prepare('SELECT * FROM ' . $tableName . ' WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
/**
* Метод добавляет данные в базу
*
* @author Sergey
* @return Добавление данных в базу
*/
    public static function addToDb($tableName, $name, $description, $img)
    {
        $pdo = self::connectDb();

        $stmt = $pdo->prepare('INSERT INTO ' . $tableName . ' (topic_name, description, img) VALUES (:name, :description, :img)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':img', $img);
        return $stmt->execute();
    }
    
/**
* Метод удаляет данные из базы
*
* @author Sergey
* @return Удаление данных из базы
*/
    public static function delete($tableName, $id)
    {
        $pdo = self::connectDb();

        $stmt = $pdo->prepare('DELETE FROM ' . $tableName . ' WHERE id=:id');
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }
}