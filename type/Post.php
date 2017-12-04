<?php

namespace Type;

use DataSource\TagDataSource;
use DataSource\UserDataSource;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class Post extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Post',
            'fields' => [
                'id' => [
                    'type' =>Type::id(),
                ],
                'title' => [
                    'type' => Type::string(),
                ],
                'contents' => [
                    'type' => Type::string()
                ],
                'author' => [
                    'type' => User::getInstance(),
                ],
                'tags' => Type::listOf(Tag::getInstance())
            ],
            'resolveField' => function ($value, $args, $context, ResolveInfo $info) {
                $method = 'resolve' . ucfirst($info->fieldName);
                if (method_exists($this, $method)) {
                    return $this->{$method}($value, $args, $context, $info);
                } else {
                    return $value->{$info->fieldName};
                }
            }
        ];
        parent::__construct($config);
    }

    private static $singleton;

    public static function getInstance(): self
    {
        return self::$singleton ? self::$singleton : self::$singleton = new self();
    }

    public function resolveAuthor($value)
    {
        return UserDataSource::getById($value->authorId);
    }

    public function resolveTags($value)
    {
        return TagDataSource::getByPostId($value->id);
    }
}
