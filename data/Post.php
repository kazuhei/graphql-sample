<?php

namespace Data;

class Post
{
    // DBから取得可能
    public $id;
    public $title;
    public $contents;
    public $authorId;

    // graphql-phpに上書きされる
    public $author;
    public $tags;

    public function __construct(string $id, string $title, string $contents, string $authorId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->contents = $contents;
        $this->authorId = $authorId;
    }
}
