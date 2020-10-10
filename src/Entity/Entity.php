<?php


namespace App\Entity;


class Entity
{
    public function __toString(): string
    {
        if (isset($this->name)) {
            return $this->name;
        }
        return get_class($this);
    }
}