<?php

class Db
{

    public static function getConnection()
    {

        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        try {
            $db = new PDO("mysql:host={$params['host']};dbname={$params['dbname']}", $params['user'], $params['password']);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        return $db;
    }
}
