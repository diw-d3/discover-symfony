<?php

namespace App\Model;

class Product
{
    private static $autoIncrement = 1;
    private $id;
    private $name;
    private $slug;
    private $description;
    private $price;

    public function __construct($name, $slug, $description, $price)
    {
        $this->id = self::$autoIncrement++;
        $this->name = $name;
        $this->slug = $slug;
        $this->description = $description;
        $this->price = $price;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
