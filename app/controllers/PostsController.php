<?php

namespace app\controllers;

class PostsController extends AppController
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
