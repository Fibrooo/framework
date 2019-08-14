<?php

namespace app\controllers;

class Main extends App
{
    

    public function indexAction()
    {

        $this->view = 'test';

        $name = "Артем";

        $this->set(['name' => $name]);
        
    }
}
