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
        
        include 'Views/News/news.php';
    }
/**
* Действие подключает представление
*
* @author Sergey
*/    
    public function actionDitail()
    {
        $result = SystemDatabase::findOneById('topics', $_GET['id']);

        include 'Views/News/detail.php';
    }
/**
* Действие подключает представление
*
* @author Sergey
*/
    public function actionViews()
    {
        include 'Views/News/form.php';
    }
/**
* Действие создает новость
*
* @author Sergey
*/
    public function actionCreate()
    {
        $result = SystemDatabase::addTo_bd('topics', $_POST['name'], $_POST['description']);

        if ($result) {
            header('Location: /page/news', true, 303);
        }
    }
/**
* Действие удаляет новость
*
* @author Sergey
*/
    public function actionDelete()
    {
        $result = SystemDatabase::delete('topics', $_GET['id']);

        if ($result) {
            header('Location: /page/news', true, 303);
        }
    }
}