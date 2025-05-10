<?php

session_start();

if (isset($_SESSION['cached_data']) && isset($_SESSION['cached_time'])) {
    $age = time() - $_SESSION['cached_time'];

    if ($age < 600) {
        $data = $_SESSION['cached_data'];
        $source = 'from session cache';
    } else {
        $data = generateData();
        $_SESSION['cached_data'] = $data;
        $_SESSION['cached_time'] = time();

        $source = 'cache updated';
    }
} else {
    $data = generateData();
    $_SESSION['cached_data'] = $data;
    $_SESSION['cached_time'] = time();

    $source = 'cache created';
}


function generateData()
{
    sleep(2);

    return ['usd' => rand(35, 40), 'eur' => rand(38, 43)];
}

echo "<p>Data: " . json_encode($data) . "</p>";
echo "<p>Source: " . $source . "</p>";
