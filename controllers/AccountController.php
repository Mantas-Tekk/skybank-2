<?php

namespace Bank\Controllers;

use App\DB\JsonDB;
use App\Validator;
use App\Generator;

class AccountController {

    private $db;
    private $validator;
    private $generator;

    function __construct()
    {
        //echo 'cunstructed Account controller <br>';
    }

    public function create1() {

        // if(isset($_POST['register'])) {
        //     _c('create');
        //     _c($_POST);
        //     header('Location: '.INSTALL_DIR.'/account/save');
        // }
        require DIR . '/../views/create.php';
    }
    
    function save() {

        if(isset($_POST['register'])) {
            $user = [
                'name' => $_POST['name'],
                'surname' => $_POST['lastname'],
                'personalNumber' => $_POST['personalnumber'],
                'iban' => 'LT12 1000 0818 8944 4578',
                'balance' => '0.00',
                'id' => 0,
            ];
    
            var_dump($_POST);
            $this->validator = new Validator();
            $this->db = new JsonDB();
    
            if($this->validator->fromInputsvalidaion($user, $this->db->showAll​())) {
                $this->generator = new Generator();
                $user['iban'] = $this->generator->ibanGenerator();
                $this->db->create​($user);
                header('Location: '.INSTALL_DIR.'/account');
    
            } else {
                header('Location: '.INSTALL_DIR.'/account/create');
            }
        }

        //  echo 'SAVE <br>';
    }

    function edit() {
        require DIR . '/../views/edit.php';
    }

    function update() {
        require DIR . '/../views/update.php';
    }

    function delete() {
        echo 'DELETE <br>';
    }

    function index() {
        $db = new JsonDB();
        $data = $db->showAll​();

        require DIR . '/../views/account.php';
    }
}