<?php

namespace App\Model;

class Product implements \JsonSerializable
{
    private int $id;
    private String $name;

    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): String
    {
        return $this->name;
    }

    public function setName(String $value):void
    {
        $this->login = $value;
    }

    public function jsonSerialize():array
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
        ];
    }
}