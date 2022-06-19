<?php

namespace julia\bankOO\Model;

class EmployeeInternal extends Person
{
    private $employeeRole;
    private $salary;

    public function __construct(string $employeeName,Document $employeeDocument,string $employeeRole, float $salary)
    {
        parent::__construct($employeeName,$employeeDocument);
        $this->employeeRole = $employeeRole;
        $this->salary = $salary;
    }

    public function getEmployeeRole()
    {
        return $this->employeeRole;
    }

    public function bonusCalculator()
    {
        if ($this->employeeRole == "Gerente")
        {
            return $this->salary;
        }
        return $this->salary*0.1;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }
}

