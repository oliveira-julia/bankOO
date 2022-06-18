<?php


class Holder extends Person
{
    private $address;

    public function __construct($holderName, Document $holderDocument,Address $address )
    {
        parent::__construct($holderName,$holderDocument);
        $this->Address = $address;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }
}

?>