<?php

namespace app\controllers;

use vendor\core\base\Controller;

class Posts extends Controller
{

    public function indexAction()
    {

        echo "Method::index";

        debug($this->route);
    }

    public function testAction()
    {

        echo "Method::test";
    }

    public function testPageAction()
    {

        echo "Method::testPage";
    }

    public function before()
    { }
}
