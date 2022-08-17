<?php


namespace julia\bankOO\Model\Account;

class CheckingAccount extends Account
{
    protected function taxPercent(): float
    {
        return 0.05;
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
}