<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["first_name"] ?? "");
    $lastName = trim($_POST["last_name"] ?? "");

    if (empty($firstName) || empty($lastName)) {
        echo "Please fill in all fields.";
    } elseif (!preg_match("/^[a-zA-ZА-Яа-яЇїЄєІіҐґ' -]+$/u", $firstName) || !preg_match("/^[a-zA-ZА-Яа-яЇїЄєІіҐґ' -]+$/u", $lastName)) {
        echo "Invalid name format.";
    } else {
        echo "Hello, $firstName $lastName!";
    }
}
?>