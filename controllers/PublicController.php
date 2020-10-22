<?php

namespace Bank\Controllers;

class PublicController {

    function index() {
        require DIR . '/../views/main/main.php';
    }
}