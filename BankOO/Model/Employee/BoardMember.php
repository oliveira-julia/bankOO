<?php


namespace julia\bankOO\Model\Account\Employee;


class BoardMember extends EmployeeInternal implements Authenticate

{
    public function bonusCalculator()
    {
        return $this->getSalary() * 2;
    }

    public function authentication(string $password): bool
    {
        return $password === '1234';
    }
}

?>