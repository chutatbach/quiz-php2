<?php
session_start();
include_once "./commons/global.php";
include_once './vendor/autoload.php';
include_once "./commons/helpers.php";
$url = isset($_GET['url']) ? $_GET['url'] : '/';
include_once "./commons/session_cookie.php";
\App\helpers\Route::run($url);
