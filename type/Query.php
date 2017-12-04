<?php

namespace Type;

use DataSource\PostDataSource;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class Query extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Query',
            'fields' => [
                'posts' => [
                    'type' => Type::listOf(Post::getInstance()),
                ],
                'popularPosts' => [
                    'type' => Type::listOf(Post::getInstance()),
                ],
                'post' => [
                    'type' => Post::getInstance(),
                    'args' => [
                        'id' => [
                            'type' => Type::id(),
                        ],
                    ]
                ],
            ],
            'resolveField' => function($value, $args, $context, ResolveInfo $info) {
                switch($info->fieldName) {
                    case 'posts':
                        return PostDataSource::getList();
                    case 'popularPosts':
                        return PostDataSource::popularList();
                    case 'post':
                        return PostDataSource::getById($args['id']);
                }
                throw new \RuntimeException('query not found');
            }
        ];
        parent::__construct($config);
    }

    private static $singleton;

    public static function getInstance(): self
    {
        return self::$singleton ? self::$singleton : new self();
    }
}
