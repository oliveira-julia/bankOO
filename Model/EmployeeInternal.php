<?php


class EmployeeInternal extends Person
{
    private $employeeRole;

    public function __construct(string $employeeName,Document $employeeDocument,string $employeeRole)
    {
        parent::__construct($employeeName,$employeeDocument);
        $this->employeeRole = $employeeRole;
    }

    public function getEmployeeRole()
    {
        return $this->employeeRole;
    }
}
