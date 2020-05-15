<?php 
require_once('./controllers/Autoload.php');
$autoload = new Autoload();
$router = isset($_GET['r']) ? $_GET['r'] :'inicio' ;
$sis = new Router($router);