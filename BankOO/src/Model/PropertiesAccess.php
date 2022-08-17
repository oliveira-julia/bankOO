<?php


namespace julia\bankOO\Model;

trait PropertiesAccess
{
    public function __get($atributtename)
    {
        $method = "Get" . ucfirst($atributtename);
        return $this->city;
    }
}