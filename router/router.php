<?php
// Class auto loader
require_once DIR2 . '/vendor/autoload.php';

use Bank\Controllers\AccountController;
use Bank\Controllers\NotfoundController;
use Bank\Controllers\PublicController;


$route = str_replace(INSTALL_DIR, '', $_SERVER['REQUEST_URI']);
if (substr($route, 0, 1) == '/') {
    $route = substr($route, 1);
}

//  echo $_SERVER['REQUEST_URI'].'<br>';
// echo $route.'<br>';

$path = explode('/', $route);
//var_dump($path);

//INDEX ROUTING
if ('' == strtolower($path[0]) && count($path) == 1 || 'index' == strtolower($path[0]) && count($path) == 1) {
    $publicCOntroller = new PublicController();
    $publicCOntroller->index();

    //ACCOUNTS ROUTING
} elseif ('account' == strtolower($path[0]) && count($path) == 1) {
    $accountController = new AccountController();
    $accountController->index();
} elseif ('account' == strtolower($path[0]) && count($path) > 1) {
    $accountController = new AccountController();

    if ('edit' == strtolower($path[1]) && count($path) > 1) {
        $accountController->edit();
    } elseif ('create' == strtolower($path[1]) && count($path) > 1) {
        $accountController->create1();
    } elseif ('update' == strtolower($path[1]) && count($path) > 1) {
        $accountController->update();
    } elseif ('delete' == strtolower($path[1]) && count($path) > 1) {
        $accountController->delete();
    } elseif ('save' == strtolower($path[1]) && count($path) > 1) {
        $accountController->save();
    } else {
        $notfoundController = new NotfoundController();
        $notfoundController->notFound();
    }

    //LOGIN ROUTING
}elseif ('login' == strtolower($path[0]) && count($path) == 1) {
    echo 'LOGIN <br>';
} elseif ('login' == strtolower($path[0]) && count($path) == 1) {
    echo 'LOGIN <br>';

    // REGISTER ROUTING
} elseif ('register' == strtolower($path[0]) && count($path) == 1) {
    echo 'REGISTER <br>';
} else {
    $notfoundController = new NotfoundController();
    $notfoundController->notFound();
}
