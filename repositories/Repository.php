<?php

namespace App\repositories;

use App\entities\Entity;
use App\services\DB;

abstract class Repository
{
    /**
     * @var DB
     */
    protected $db;

    abstract protected function getTableName();
    abstract protected function getEntityName();

    public function __construct()
    {
        $this->db = static::getDB();
    }

    protected static function getDB(): DB
    {
        return DB::getInstance();
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        $params = [':id' => $id];
        return static::getDB()->queryObject($sql, $this->getEntityName(), $params);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return static::getDB()->queryObjects($sql, $this->getEntityName());
    }

    protected function insert(Entity $entity)
    {
        $columns = [];
        $params = [];
        foreach ($entity as $fieldName => $value) {
            if ($fieldName == 'id') {
                continue;
            }
            $columns[] = $fieldName;
            $params[':' . $fieldName] = $value;
        }

        $tableName = $this->getTableName();
        $sql = "INSERT INTO {$tableName} 
                    (" . implode(', ', $columns) . ")
                VALUES 
                (" . implode(', ', array_keys($params)) . ")
                ";

        $this->db->exec($sql, $params);
        $entity->id =$this->db->lastInsertId();
    }

    protected function update(Entity $entity)
    {
        $placeholders = [];
        $params = [];
        foreach ($entity as $fieldName => $value) {
            $params[':' . $fieldName] = $value;
            if ($fieldName == 'id') {
                continue;
            }

            $placeholders[] = " $fieldName = :$fieldName";
        }

        $tableName = $this->getTableName();
        $sql = "
            UPDATE {$tableName} SET " . implode(', ', $placeholders) ." WHERE id = :id
        ";

        $this->db->exec($sql, $params);
    }

    public function delete(Entity $entity)
    {
        $sql = "DELETE FROM `users` WHERE id = :id";
        $this->db->exec($sql, [':id' => $entity->id]);
    }

    public function save(Entity $entity)
    {
        if (empty($entity->id)) {
            $this->insert($entity);
        }
        $this->update($entity);
    }
}