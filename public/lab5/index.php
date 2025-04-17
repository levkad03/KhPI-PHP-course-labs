<?php

require_once 'BankAccount.php';
require_once 'SavingsAccount.php';

echo "<h2>Testing</h2>";

try {
    $account = new BankAccount("USD", 100);
    $account->deposit(50);
    $account->withdraw(30);
    echo "Balance: " . $account->getBalance() . "<br><br>";

    $account2 = new SavingsAccount("USD", 200);
    $account2->deposit(100);
    $account2->withdraw(50);
    $account2->applyInterest();
    echo "Balance of the savings account: " . $account2->getBalance() . "<br><br>";

    $account->withdraw(1000);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br><br>";
}

try {
    $account->deposit(-10);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br><br>";
}

try {
    $account->withdraw(-5);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br><br>";
}

try {
    $badAccount = new BankAccount("USD", -100);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br><br>";
}
