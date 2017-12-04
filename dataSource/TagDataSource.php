<?php

namespace DataSource;

use Data\Tag;

class TagDataSource
{
    private static $data;

    public static function init()
    {
        self::$data = [
            "1" => [new Tag("Prism Stone"), new Tag("SoLaMi Dressing"),],
            "2" => [new Tag("armageddon")],
            "3" => [new Tag("nonsugar")],
            "4" => [new Tag("DanPri"), new Tag("FantasyTime"),],
        ];
    }

    public static function getByPostId(string $id): array
    {
        if (self::$data[$id]) {
            return self::$data[$id];
        }
        throw new \RuntimeException('Not Found');
    }
}
