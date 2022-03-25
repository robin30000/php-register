<?php
error_reporting(0);
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

if (isset($_POST['method'])) {
    switch ($_POST['method']) {

        case 'newUser':
            require_once '../class/user.php';
            $user = new user();
            $user->newUser($_POST['data']);
            break;

        default:
            echo 'ninguna opción.';
            break;
    }
} else {
    echo 'ninguna opción valida.';
}


