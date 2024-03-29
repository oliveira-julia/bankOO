<?php

namespace julia\bankOO\Model;

use InvalidArgumentException;

class Address
{

    protected $cep;
    protected $street;
    protected $number;
    protected $city;
    protected $district;
    protected $state;

    public function __construct($cep, $street, $number)
    {
        $this->cep = $cep;
        $this->street = $street;
        $this->city = "";
        $this->number = $number;
        $this->state = "";
        $this->district = "";
        $this->getcep($this->cep);

    }

    public function getcep($cep)
    {
        $cep = $this->cep;

        if(!preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $cep))
        {
            $this->invalidArgumentException();
        }else{
            $cep = str_replace("-", "", $cep);

            $json = file_get_contents('https://viacep.com.br/ws/'. $cep. '/json/');

            $viaCepInfo = json_decode($json, true);

        }
        if (empty($viaCepInfo["logradouro"]) == false){
            $this->street = $viaCepInfo["logradouro"];
        }
        $this->city = $viaCepInfo["localidade"];
        $this->state = $viaCepInfo["uf"];
        $this->district = $viaCepInfo["bairro"];
    }

    protected function invalidArgumentException()
    {
        try{
            throw new invalidArgumentException("Invalid CEP");
        }catch(invalidArgumentException $e){
            echo 'Caught exception#';
        }finally{
            echo "<br> Finalizado.";
        }
    }

    public function __toString()
    {
        return $this->street ." ". $this->number ." , ". $this->bairro ." , ". $this->city ." , ". $this->state . " , ". $this->cep;
    }

    public function setStreet($newStreet)
    {
        $this->street = $newStreet;
    }

    public function setnumber($number)
    {
        $this->number = $number;
    }

}
?>