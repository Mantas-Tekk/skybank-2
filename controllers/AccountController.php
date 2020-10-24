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

    function edit(int $id, string $action)
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
        $this->db = new JsonDB();
        $this->validator = new Validator();

        if (isset($_POST['add'])) {
            $id = $_POST['id'];

            if ($this->validator->validSumValidator($_POST['money'])) {

                $user = $this->db->show​($id);
                $user['balance'] += $_POST['money'];
                $user['balance'] = number_format($user['balance'], 2, ".", "");
                $this->db->update​((int)$id, $user);
                //
                header('Location: ' . INSTALL_DIR . '/account/edit/' . $_POST['id'] . '/add');
            } else {
                header('Location: ' . INSTALL_DIR . '/account/edit/' . $_POST['id'] . '/add');
            }
            //header('Location: ' . INSTALL_DIR . '/account');
        } elseif (isset($_POST['sub'])) {
            $id = $_POST['id'];
            if ($this->validator->validSumValidator($_POST['money'])) {
                $user = $this->db->show​($id);

                if (($user['balance'] - $_POST['money']) >= 0) {

                    $user['balance'] -= $_POST['money'];
                    $user['balance'] = number_format($user['balance'], 2, ".", "");

                    $this->db->update​((int)$id, $user);
                    header('Location: ' . INSTALL_DIR . '/account/edit/' . $_POST['id'] . '/sub');
                } else {
                    header('Location: ' . INSTALL_DIR . '/account/edit/' . $_POST['id'] . '/sub');
                }
            }
            //header('Location: ' . INSTALL_DIR . '/account');
        } else {
            header('Location: ' . INSTALL_DIR . '/account');
        }
    }

    function delete(int $id)
    {
        $this->db = new JsonDB();
        $user = $this->db->show​($id);
        if($user['balance'] == 0 ) {
            $this->db->delete($id);
        }
        header('Location: ' . INSTALL_DIR . '/account');
    }
    
    function index()
    {
        $this->db = new JsonDB();
        $data = $this->db->showAll​();

        require DIR . '/../views/account.php';
    }
}
