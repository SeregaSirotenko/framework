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
        include 'Views/News/create.php';
    }
/**
* Действие создает новость
*
* @author Sergey
*/
    public function actionCreate()
    {

        $path = 'img/';
        $ext = $_FILES['picture']['name'];
        $full_path = $path . $ext;
        if($_FILES['picture']['error'] == 0){
        if(move_uploaded_file($_FILES['picture']['tmp_name'], $full_path)){
            $result = SystemDatabase::addToDb('topics', $_POST['name'], $_POST['description'], $full_path);                       
    }
}

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
        $res = SystemDatabase::findOneById('topics', $_GET['id']);
        $path = $res['img'];
        
        $result = SystemDatabase::delete('topics', $_GET['id']);

        if ($result) {
            unlink($path);
            header('Location: /page/news', true, 303);
        }
    }
}