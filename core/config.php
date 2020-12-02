<?php
error_reporting(E_ALL);
session_start();
define("ROOT", $_SERVER['DOCUMENT_ROOT']);
define("CONTROLLER_PATH", ROOT . "/app/controllers/");
define("MODELS_PATH", ROOT . "/app/models/");
define("VIEW_PATH", ROOT . "/app/views/");
define("TEMPLATE_PATH", ROOT . "/templates/");
define("PAGINATE_ROWS", 3);
define("DEFAULT_ORDER_BY", "name");
define("TEMPLATE_LAYOUT", TEMPLATE_PATH . "layouts/default.tpl.php");
define("DB_USER", "homestead");
define("DB_PASS", "secret");
define("DB_HOST","localhost");
define("DB_NAME",  "todo");
require_once("MysqlConnection.php");
require_once("Route.php");
require_once CONTROLLER_PATH . 'Controller.php';
require_once MODELS_PATH . 'Model.php';
require_once VIEW_PATH . 'View.php';

Route::buildRoute();


