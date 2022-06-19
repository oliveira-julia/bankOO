<?php

namespace julia\bankOO\Model\Account;

use julia\bankOO\Model\EmployeeInternal;
class BonusController
{
    private $bonusTotal;

    public function addBonusTo(EmployeeInternal $employeeInternal)
    {
        $this->bonusTotal += $employeeInternal->bonusCalculator();
    }

    public function getBonusTotal(): float
    {
        return $this->bonusTotal;
    }
}