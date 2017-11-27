<?php

namespace controllers;
/**
* Контроллер новостей
*
* @author Sergey
*/
class NewsController
{
/**
* Действие подключает представление
*
* @author Sergey
*/
    public function actionIndex()
    {
        include 'Views/News/index.php';
    }
}