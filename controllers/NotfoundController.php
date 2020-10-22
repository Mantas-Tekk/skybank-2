<?php

namespace Bank\Controllers;

class NotfoundController {

    function __construct()
    {
        //echo 'cunstructed Account controller <br>';
    }

    function notFound() {
        require DIR . '/../views/main/notfound.php';
    }

}