<?php

abstract class AdminBase
{

    public static function checkAdmin()
    {

        $userId = User::checkLogged();

        $user = User::getUserId($userId);

        if ($user['role'] == 'admin') {
            return true;
        }

        die('Access denied');
    }

}
