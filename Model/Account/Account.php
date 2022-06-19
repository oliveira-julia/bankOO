<?php

namespace julia\bankOO\Model\Account;

class CheckingAccount
{
    private $holder;
    protected $accountBalance;
    protected $accountLimit;

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
        $withdrawalTax = $withdrawAmount * $this->taxPercent();
        $withdrawValue = $withdrawAmount + $withdrawalTax;
        if (($this->accountBalance + $this->accountLimit)< $withdrawValue)
        {
            echo "You have insufficient funds in your account to complete the withdrawal", PHP_EOL;
            return;
        }
        $this->accountBalance -= $withdrawValue;
        echo "Withdrawal successfully completed.", PHP_EOL;
    }

    public function wireTransfer(float $transferAmount, CheckingAccount $targetAccount)
    {
        if (($this->accountBalance + $this->accountLimit)< $transferAmount)
        {
            echo "You have insufficient funds in your account to complete the wire", PHP_EOL;
            return;
        }
        $this->withdraw($transferAmount);
        $targetAccount->deposit($transferAmount);
    }

    protected function taxPercent():float
    {
        return 0.05;
    }
}


?>