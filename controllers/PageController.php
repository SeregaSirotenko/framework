<?php

namespace controllers;
use core\classes\SystemDatabase;
/**
* Контроллер страниц
*
* @author Sergey
*/
class PageController
{
/**
* Действие выводит строку
*
* @author Sergey
*/
    public function actionTest()
    {
        echo 'Test My First Action';
    }
/**
* Действие подключает представление
*
* @author Sergey
*/
    public function actionNews()
    {
        $res = SystemDatabase::findAll('topics');
        
        include 'Views/News/table.php';
    }
    public function actionWorldNews()
    {
        $result = SystemDatabase::findOneById('topics', $_GET['id']);

        include 'Views/News/mynews.php';
    }
}