<?php
namespace App\models;

use App\services\DB;

abstract class Model
{
    protected $db;

    abstract protected function getTableName();

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = $id";
        $params = [':id' => $id];
        return $this->db->find($sql, $params);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM ";
        return $this->db->findAll($sql);
    }

    public function insert()
    {
        $sql = "INSERT INTO {$this->getTableName()}
                (login, password, name)
                VALUES 
                ('$this->login', '$this->password', '$this->name')";
        return $this->db->exec($sql);
    }


    public function update()
    {
        $sql = "UPDATE {$this->getTableName()}
        SET login = '$this->login', password = '$this->password' , name = '$this->name' 
        WHERE id = $this->id";
        return $this->db->exec($sql);
    }

    public function delete()
    {
        $sql = "DELETE FROM {$this->getTableName()}
        WHERE id = $this->id";
        return $this->db->exec($sql);
    }

    public function save()
    {
        if (empty($this->id)) {
            $this->insert();
        } else {
            $this->update();
        }
    }
}