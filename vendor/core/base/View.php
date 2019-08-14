<?php

namespace vendor\core\base;

/**
 * Undocumented class
 */
class View
{
    /**
     * Текущий маршрут
     *
     * @var array
     */
    public $route = [];

    /**
     *  Текущий вид
     * 
     * @var string
     */

    public $view;

    /**
     * Текущий шаблон
     *
     * @var string
     */
    public $layout;


    public function __construct($route, $layout = '', $view = '')
    {
        $this->route = $route;

        if ($layout === false) {
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }

        $this->view = $view;
    }

    public function render($vars)
    {
        if(is_array($vars)) extract($vars);
        $file_view = APP . "/views/{$this->route['controller']}/{$this->view}.php";
        ob_start();
        if (is_file($file_view)) {
            require $file_view;
        } else {
            echo "<p> Вид <strong>{$file_view}</strong> не найден</p>";
        }
        $content = ob_get_clean();

        if (false !== $this->layout) {

            $file_layout = APP . "/views/layouts/{$this->layout}.php";
    
            if (is_file($file_layout)) {
                require $file_layout;
            } else {
                echo "<p> Шаблон <strong>{$file_layout}</strong> не найден</p>";
            }
        }
    }
}
