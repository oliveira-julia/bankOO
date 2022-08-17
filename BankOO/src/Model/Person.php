<?php

namespace julia\bankOO\Model;

class Person
{
    use PropertiesAccess;
    protected $name;
    private $cpfNumber;

    public function __construct(string $name,Document $cpfNumber)
    {
        $this->checkName($name);
        $this->name = $name;
        $this->cpfNumber = $cpfNumber;
    }

    public function getDocument()
    {
        return $this->cpfNumber;
    }

    public function getName()
    {
        return $this->name;
    }

    protected function checkName($name)
    {
        if (strlen($name) < 3) {
            throw new InvalidNameException();
        }
    }

}