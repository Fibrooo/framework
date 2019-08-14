<?php

namespace app\controllers;

class MainController extends AppController
{
    

    public function indexAction()
    {

        $this->view = 'test';

        $name = "Артем";

        $this->set(['name' => $name]);
        
    }
}
