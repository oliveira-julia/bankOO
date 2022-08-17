<?php


namespace julia\bankOO\Model\Account;

class InsufficientFundsException extends \DomainException
{
    public function __construct(float $withdrawValue, float $balance)
    {
        $message = "You've tried to withdraw $withdrawValue. You have insufficient funds to perform this transaction.";
        parent::__construct($message);
    }
}