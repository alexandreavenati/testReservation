<?php
require_once('../config.php');

// recup l'url actuelle
$requestUri = $_SERVER['REQUEST_URI'];

// découpe l'url
$uri = parse_url($requestUri, PHP_URL_PATH);
// remplace 
$endUri = str_replace('/reservation/public', '', $uri);
$endUri = trim($endUri, '/');

if ($endUri === "") {
    require_once('../controller/home-controller.php');
} else if ($endUri === "nouvelle-reservation") {
    require_once('../controller/create-reservation-controller.php');
} else if ($endUri === "annuler-reservation") {
    require_once('../controller/cancel-reservation-controller.php');
} else if ($endUri === "payer-reservation") {
    require_once('../controller/pay-reservation-controller.php');
} else if ($endUri === "comment-reservation") {
    require_once('../controller/comment-reservation-controller.php');
}