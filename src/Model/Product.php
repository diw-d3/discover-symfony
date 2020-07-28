<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Product
{
    private static $autoIncrement = 1;
    private $id;

    /**
     * @Assert\NotBlank()
     */
    private $name;
    private $slug;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=10)
     */
    private $description;
    private $price;

    public function __construct($name = null, $slug = null, $description = null, $price = null)
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

    public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

    public function getSlug()
    {
        return $this->slug;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

    public function getPrice()
    {
        return $this->price;
    }
}
