<?php

require_once 'AccountInterface.php';

class BankAccount implements AccountInterface
{
    const MIN_BALANCE = 0;

    protected float $balance;
    protected string $currency;

    public function __construct($currency = "USD", $initial_balance = 0)
    {
        if ($initial_balance < self::MIN_BALANCE) {
            throw new Exception("Initial balance cannot be less than " . self::MIN_BALANCE);
        }

        $this->currency = $currency;
        $this->balance = $initial_balance;
    }

    public function deposit($amount)
    {
        if ($amount <= 0) {
            throw new Exception("Deposit amount must be greater than 0");
        }

        $this->balance += $amount;
        echo "$amount $this->currency was deposited successfully.<br>";
    }

    public function withdraw($amount)
    {
        if ($amount <= 0) {
            throw new Exception("Withdrawal amount must be greater than 0");
        }

        if ($amount > $this->balance) {
            throw new Exception("Insufficient funds");
        }

        $this->balance -= $amount;
        echo "$amount $this->currency was withdrawn successfully.<br>";
    }

    public function getBalance()
    {
        return $this->balance . " " . $this->currency;
    }
}
