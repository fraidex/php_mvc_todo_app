<?php

class MysqlConnection
{

    private static $connection;

    /**
     * @return mixed
     */
    public static function getConnection()
    {
        $user = DB_USER;
        $pass = DB_PASS;
        $host = DB_HOST;
        $db = DB_NAME;
        if (!self::$connection) self::$connection = new PDO("mysql:dbname=$db;host=$host", $user, $pass);
        return self::$connection;
    }

}