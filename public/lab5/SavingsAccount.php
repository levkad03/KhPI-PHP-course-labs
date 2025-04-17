<?php

require_once 'BankAccount.php';

class SavingsAccount extends BankAccount
{
    public static $interestRate = 0.03;

    public function applyInterest()
    {
        $interest = $this->balance * self::$interestRate;
        $this->balance += $interest;
        echo "Interest applied: $interest\n";
    }
}
