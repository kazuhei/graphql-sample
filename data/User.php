<?php

namespace Data;

class User
{
    public $id;
    public $name;
    public $age;

    public function __construct(string $id, string $name, int $age)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
    }

    public function sameAs(string $id): bool
    {
        return $this->id === $id;
    }
}
