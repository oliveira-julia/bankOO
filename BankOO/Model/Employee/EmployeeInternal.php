<?php

namespace julia\bankOO\Model\Account\Employee;

use julia\bankOO\Model\Document;
use julia\bankOO\Model\Person;

abstract class EmployeeInternal extends Person
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

    public function getSalary(): float
    {
        return $this->salary;
    }

    abstract public function bonusCalculator();

    public function setRaise($raiseValue)
    {
        if ($raiseValue < 0 )
        {
            return "The raise value must be POSITIVE";
        }
    $this->salary += $raiseValue;
    }

}

