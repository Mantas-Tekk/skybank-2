<?php
// declare(strict_types = 1);
namespace App\DB;

use App\DB\DataBase;
use App\DB\integer;

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

    function update​(integer $userId, array $userData): void
    {
        
    }

    function delete(integer $userId): void
    {

    }

    function show​(integer $userId): array
    {
        return $a = [];
    }
    
    function showAll​(): array
    {
        $users = json_decode(file_get_contents(DIR2.'/db/data.json'));
        return $users;
    }

    private function getNextId() {
        $bigestId = 1;
        if(is_array($this->data)) {
            foreach($this->data as $value) {
                if($value->id > $bigestId) {
                    $bigestId = $value->id; 
                }
            }
            $bigestId++;
        }
        return $bigestId;
    }

    public function getData() {
        $this->data = json_decode(file_get_contents(DIR2.'/db/data.json'));
        // var_dump($this->data);
    }

    private function insertData(array $data) {
        $this->data[] = $data;
        $this->data = file_put_contents(DIR2.'/db/data.json', json_encode($this->data) );
    }
}
