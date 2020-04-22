<?php
namespace App\models;

class Order extends Model
{

    protected function getTableName()
    {
        return 'order';
    }

    /**
     * Получение одной записи
     *
     * @param string $sql
     * @return mixed
     */
    public function find(string $sql)
    {
        // TODO: Implement find() method.
    }

    public function findAll(string $sql)
    {
        // TODO: Implement findAll() method.
    }
}