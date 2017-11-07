<?php

namespace controllers;
use core\classes\SystemDatabase;

class PageController
{
    public function actionTest()
    {
        echo 'Test My First Action';
    }
    public function actionNews()
    {
        $res = SystemDatabase::findAll('topics');
        
        include 'Views/News/table.php';
    }
}