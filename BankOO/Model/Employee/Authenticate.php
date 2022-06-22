<?php

namespace julia\BankOO\Model;

interface Authenticate
{
    public function tryauthenticate(string $password): bool;
}