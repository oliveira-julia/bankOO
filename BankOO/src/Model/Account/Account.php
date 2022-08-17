<?php

namespace julia\bankOO\Model\Account;

use http\Exception\InvalidArgumentException;

abstract class Account
{
    private Holder $holder;
    protected float $accountBalance;
    protected float $accountLimit;

    public function __construct(Holder $holder)
    {
        $this->holder = $holder;
        $this->accountBalance = 0;
        $this->accountLimit = 0;
    }

    public function getAccountBalance():float
    {
        return "you have a balance of: {$this->accountBalance}";
    }

    public function getAccountLimit():float
    {
        return $this->accountLimit;
    }

    protected function setAccountLimit($newaccountLimit):float
    {
        $this->accountLimit = $newaccountLimit;
        return $this->$newaccountLimit;
    }

    public function deposit($depositAmount)
    {
        if($depositAmount < 0)
        {
            throw new InvalidArgumentException();
        }
        $this->accountBalance += $depositAmount;
        echo "Deposit successfully completed.", PHP_EOL;
    }

    public function withdraw($withdrawAmount)
    {
        $withdrawalTax = $withdrawAmount * $this->taxPercent();
        $withdrawValue = $withdrawAmount + $withdrawalTax;
        if (($this->accountBalance + $this->accountLimit)< $withdrawValue)
        {
            throw new InsufficientFundsException($withdrawValue, $this->accountBalance);
        }
        $this->accountBalance -= $withdrawValue;
        echo "Withdrawal successfully completed.", PHP_EOL;
    }

    abstract protected function taxPercent():float;
}


?>