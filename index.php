<?php
// --------- Нужен для отображения ошибок--------
ini_set('display_errors', 1);
error_reporting(E_ALL);
// /////////////////////////////////////

session_start();

define('ROOT', dirname(__FILE__));
// define() - создает константу
// __FILE__ - в нем находится путь до текущего файла
// dirname() - если в него передать такой путь 'www/rrr/index.php', то получим 'www/rrr'
require_once ROOT . '/components/Autoload.php';

//Выражение require_once аналогично require за исключением того, что PHP проверит, включался ли уже данный файл, и если да, не будет включать его еще раз.

$router = new Router();
$router->run();
 