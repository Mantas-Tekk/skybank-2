<?php

namespace App\DB;

use App\DB\DataBase;

class JsonDB implements DataBase
{

    private $data;

    public function create​(array $userData): void
    {
        $this->getData();
        //var_dump($this->data);
        $id = $this->getNextId();
        $userData['id'] = $id;
        $this->insertData($userData);
    }

    function update​(int $userId, array $userData): void
    {
    }

    function delete(int $userId): void
    {
        $tempData = [];
        $this->getData();

        if (is_array($this->data)) {
            _c($this->data);
            foreach ($this->data as $value) {
                if ($value->id != $userId) {
                    $tempData[] = $value;
                }
            }
            file_put_contents(DIR2 . '/db/data.json', json_encode($tempData));
        }
    }

    function show​(int $userId): array
    {
        $this->getData();
        $users = $this->data;

        if (is_array($users)) {
            foreach ($users as $user) {
                if ($user->id == $userId) {
                    return (array)$user;
                }
            }
        }
        //var_dump($users);
        return $a = [];
    }

    function showAll​(): array
    {
        $users = json_decode(file_get_contents(DIR2 . '/db/data.json'));

        if(is_array($users)) {
            if(count($users) > 0) {
                return $users;
    
            }
        }
        return [];
    }

    private function getNextId()
    {
        $bigestId = 1;
        if (is_array($this->data)) {
            foreach ($this->data as $value) {
                if ($value->id > $bigestId) {
                    $bigestId = $value->id;
                }
            }
            $bigestId++;
        }
        return $bigestId;
    }

    public function getData()
    {
        $this->data = json_decode(file_get_contents(DIR2 . '/db/data.json'));
    }

    private function insertData(array $data)
    {
        $this->data[] = $data;
        $this->data = file_put_contents(DIR2 . '/db/data.json', json_encode($this->data));
    }
}
