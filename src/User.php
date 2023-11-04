<?php

namespace Renms\FrontController;

class User extends ActiveRecords
{

    public static function getUserList(): string
    {
        $list = [];
        $users = self::$mySql->query("SELECT * FROM users");
        foreach ($users as $user) {
            $list[] = $user;
        }

        $users->free();

        return json_encode($list);
    }

}