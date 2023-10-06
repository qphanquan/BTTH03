<?php
require_once 'config/config.php';
require_once 'config/DbConnection.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

//echo $controller.'--'.$action;
$controller = ucfirst($controller); //Chuyển kí tự đầu sang in hoa: home > Home

$controller = $controller."Controller"; //Home > HomeController
$path = "controller/".$controller.".php"; //HomeController > controllers/HomeController.php
// echo $path;
if(!file_exists($path)){
    die("Request not found. Check your path");
}
//include "$path"; // #include "controllers/HomeController.php";
require_once "$path";
$myController = new $controller();
if (method_exists($myController, $action)) {
    $myController->$action();
} else {
    echo "$action does not exist in $controller class";
}