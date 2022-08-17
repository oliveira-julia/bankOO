<?php


namespace julia\bankOO\Model\Account;


class SavingAccount extends CheckingAccount
{
    protected function taxPercent(): float
    {
        return 0.03;
    }
}