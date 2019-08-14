<?php

namespace vendor\core\base;

use vendor\core\base\View;

abstract class Controller
{

    /**
     * Маршрут
     *
     * @var array
     */
    public $route = [];

    /**
     * Вид
     *
     * @var [type]
     */
    public $view;

    /**
     * Шаблон
     *
     * @var [type]
     */
    public $layout;

    /**
     * Получение пользовательских данных
     *
     * @var array
     */

    public $vars = [];

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getView(){
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    public function set($vars) {
        $this->vars = $vars;
    }
}
