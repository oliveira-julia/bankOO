<?php

namespace julia\bankOO\service;
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