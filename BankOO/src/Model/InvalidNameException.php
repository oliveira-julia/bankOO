<?php


namespace julia\bankOO\Model;


class InvalidNameException extends \DomainException
{
    public function __construct()
    {
        $message = "The name lenght must be at lest 3 characters long.";
        parent::__construct($message);
    }
}