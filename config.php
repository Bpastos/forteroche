<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);


include('models/Router.php');

$host = 'http://'.$_SERVER['HTTP_HOST'].'/';
$root = $_SERVER['DOCUMENT_ROOT'].'/';



define("HOST", $host.'forteroche/');
define("ROOT", $root.'');
define("CONTROLLERS", ROOT.'controllers/');
define("MODELS", ROOT.'models/');
define("VIEWS", ROOT.'views/');


