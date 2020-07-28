<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
    /**
     * @Assert\NotBlank
     * @Assert\Length(min=3)
     */
    private $name;

    /**
     * @Assert\NotBlank
     * @Assert\Email
     */
    private $email;

    /**
     * @Assert\NotBlank
     * @Assert\Length(min=15)
     */
    private $message;

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
}
