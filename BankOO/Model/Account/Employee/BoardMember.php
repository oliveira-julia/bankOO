<?php


namespace julia\bankOO\Model\Account\Employee;


class BoardMember extends EmployeeInternal

{
    public function bonusCalculator()
    {
        return $this->getSalary() * 2;
    }
}