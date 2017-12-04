<?php

namespace DataSource;

use Data\User;

class UserDataSource
{
    private static $data;

    public static function init()
    {
        self::$data = [
            "1" => new User("1", "Laala Manaka", 12),
            "2" => new User("2", "Mirei Minami", 14),
            "3" => new User("3", "Sophie Hojo", 15),
        ];
    }

    public static function getById(string $id): User
    {
        if (self::$data[$id]) {
            return self::$data[$id];
        }
        throw new \RuntimeException('Not Found');
    }
}
