<?php

namespace julia\bankOO\Model\Account;

class Account
{
    private $holder;
    private $accountBalance;
    private $accountLimit;

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
            echo "It's not possible to make a deposit of a negative amount.", PHP_EOL;
            return;
        }
        $this->accountBalance += $depositAmount;
        echo "Deposit successfully completed.", PHP_EOL;
    }

    public function withdraw($withdrawAmount)
    {
        if (($this->accountBalance + $this->accountLimit)< $withdrawAmount)
        {
            echo "You have insufficient funds in your account to complete the withdrawal", PHP_EOL;
            return;
        }
        $this->accountBalance -= $withdrawAmount;
        echo "Withdrawal successfully completed.", PHP_EOL;
    }

    public function wireTransfer(float $transferAmount, Account $targetAccount)
    {
        if (($this->accountBalance + $this->accountLimit)< $transferAmount)
        {
            echo "You have insufficient funds in your account to complete the wire", PHP_EOL;
            return;
        }
        $this->withdraw($transferAmount);
        $targetAccount->deposit($transferAmount);
    }
}

?>