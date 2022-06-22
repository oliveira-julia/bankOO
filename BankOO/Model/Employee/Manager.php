<?php


namespace julia\bankOO\Model\Account\Employee;


class Manager extends EmployeeInternal implements Authenticate
{
    public function bonusCalculator()
    {
        return $this->getSalary();
    }

    public function authenticate(string $password): bool
    {
        return $password === "1234";
    }
}