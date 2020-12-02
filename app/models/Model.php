<?php


class Model
{
    protected $db = null;

    /**
     * Model constructor.
     * @param $db
     */
    public function __construct()
    {
        $this->db = MysqlConnection::getConnection();
    }


}