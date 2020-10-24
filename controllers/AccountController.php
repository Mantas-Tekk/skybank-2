<?php

namespace Bank\Controllers;

use App\DB\JsonDB;
use App\Validator;
use App\Generator;

class AccountController
{

    private $db;
    private $validator;
    private $generator;

    function __construct()
    {
        //echo 'cunstructed Account controller <br>';
    }

    public function create1()
    {
        require DIR . '/../views/create.php';
    }

    function save()
    {

        if (isset($_POST['register'])) {
            $user = [
                'name' => $_POST['name'],
                'surname' => $_POST['lastname'],
                'personalNumber' => $_POST['personalnumber'],
                'iban' => 'LT12 1000 0818 8944 4578',
                'balance' => '0.00',
                'id' => 0,
            ];

            $this->validator = new Validator();
            $this->db = new JsonDB();

            if ($this->validator->fromInputsvalidaion($user, $this->db->showAll​())) {
                $this->generator = new Generator();
                $user['iban'] = $this->generator->ibanGenerator();
                $this->db->create​($user);
                header('Location: ' . INSTALL_DIR . '/account');
            } else {
                header('Location: ' . INSTALL_DIR . '/account/create');
            }
        }
    }

    function edit(int $id)
    {
        //echo 'id:'.$id.'<br>';
        $this->db = new JsonDB();

        $user = $this->db->show​($id);
        _c($user);
        if (!(count($user) == 0)) {
            // EDIT DATA AND SAVE

            require DIR . '/../views/edit.php';
        } else {
            header('Location: ' . INSTALL_DIR . '/account/edit/notfound');
        }
    }

    function update()
    {
        require DIR . '/../views/update.php';
    }

    function delete(int $id)
    {
        $this->db = new JsonDB();
        $this->db->delete($id);

        // echo 'id:' . $id . '<br>';
        echo 'DELETE <br>';
        header('Location: ' . INSTALL_DIR . '/account');
    }

    function index()
    {
        $this->db = new JsonDB();
        $data = $this->db->showAll​();



        require DIR . '/../views/account.php';
    }
}
