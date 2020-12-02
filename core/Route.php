<?php


class Route
{
    public static function buildRoute()
    {
        $controller = "IndexController";
        $model = "IndexModel";
        $action = "index";
        $without_params = explode("?", $_SERVER['REQUEST_URI']);
        $route = explode("/", $without_params[0]);

        $i = count($route) - 1;

        while ($i > 0) {
            if ($route[$i] != '') {
                if (is_file(CONTROLLER_PATH . ucfirst($route[$i]) . "Controller.php")) {
                    $controller = ucfirst($route[$i]) . "Controller";
                    $model = ucfirst($route[$i]) . "Model";
                    break;
                } else {
                    $action = $route[$i];
                }
            }
            $i--;
        }

        include CONTROLLER_PATH . $controller . ".php";
        include MODELS_PATH . $model . ".php";

        $controller = new $controller;
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            $controller->index();
        }

    }
}