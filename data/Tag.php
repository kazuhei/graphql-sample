<?php

namespace Data;

class Tag {
    public $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
