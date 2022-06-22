<?php

namespace julia\bankOO\Model;
/**
 * Class Endereco
 * @package julia\BankOO\Model
 * @property-read string $city
 * @property-read string $state
 * @property-read string $street
 * @property-read string $number
 */

final class Address
{
    use PropertiesAccess;
    private string $city;
    private string $state;
    private string $street;
    private string $number;

    public function __construct(string $city, string $state, string $street, string $number)
    {
        $this->city = $city;
        $this->state = $state;
        $this->street = $street;
        $this->number = $number;
    }

    public function __toString():string
    {
        return "{$this->street}{$this->number}{$this->city}{$this->state}";
    }
}
?>