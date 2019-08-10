<?php

namespace vendor\core;

class Router
{
    //Массив маршрутов (Таблица маршрутов)
    protected  static $routes = [];


    protected  static $route = [];


    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    } 
 
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {

            if (preg_match("#$pattern#i", $url, $matches)) {

                foreach ($matches as $k => $v) {
                    if (is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if (!isset($route['action'])) {
                    $route['action'] = 'index';
                }

                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {

            $controller = 'app\controllers\\' . self::upperCamelCase(self::$route['controller']);

            if (class_exists($controller)) {
                $cObj = new $controller;
                $action = self::lowerCamelCase(self::$route['action']) . 'Action';
                if(method_exists($cObj, $action)) {
                    $cObj->$action();
                }else {
                    echo "<br>Метод " . $action . " не найден";
                }
            } else {
                echo "<br>Контроллер " . $controller . " не найден";
            }
        } else {
            http_response_code(404);
            include '404.html';
        }
    }

    protected static function upperCamelCase($name)
    { 
        return $name = str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));    
    }

    protected static function lowerCamelCase($name)
    { 
        return lcfirst(self::upperCamelCase($name));   
    }
}
