<?php

namespace core\classes;
use PDO;

class SystemDatabase
{
    public static function findAll($tableName)
    {
        $host = 'localhost';
        $db = 'news';
        $user = 'root';
        $pass = '';
        $charset = 'utf-8';

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