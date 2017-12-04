<?php

namespace Type;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class Tag extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Tag',
            'fields' => [
                'name' => [
                    'type' => Type::string(),

                ],
            ],
        ];
        parent::__construct($config);
    }

    private static $singleton;

    public static function getInstance(): self
    {
        return self::$singleton ? self::$singleton : self::$singleton = new self();
    }
}
