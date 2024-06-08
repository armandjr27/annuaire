<?php
namespace Models\Base;
use Models\Base\Connection;
use Models\Base\QueryBuilder;

class BaseModel extends QueryBuilder
{
    protected $db;

    public function __construct() 
    {
        $this->db = Connection::getInstance()->getPdo();
    }
}