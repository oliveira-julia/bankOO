<?php


namespace julia\bankOO\Model\Account\Employee;


class developer extends EmployeeInternal
{

    public function promote()
    {
        $this->setRaise($this->getSalary()*0.75);
    }

    public function bonusCalculator()
    {
        return $this->getSalary() * 0.05;
    }
}