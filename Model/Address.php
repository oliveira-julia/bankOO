<?php


class Address
{
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

    public function getCity(): string
    {
        return $this->city;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getstreet(): string
    {
        return $this->street;
    }

    public function getNumber(): string
    {
        return $this->number;
    }
}