<?php

namespace App\Model;

class Product
{
    private $name;
    private $slug;
    private $description;
    private $price;

    public function __construct($name, $slug, $description, $price)
    {
        $this->name = $name;
        $this->slug = $slug;
        $this->description = $description;
        $this->price = $price;
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
