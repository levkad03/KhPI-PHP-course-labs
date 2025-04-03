<?php
session_start();

$inactive_time = 300;

if (isset($_SESSION['last_activity'])) {
    $elapsed_time = time() - $_SESSION['last_activity'];

    if ($elapsed_time > $inactive_time) {
        session_unset();
        session_destroy();
        header("Location: activity.html");
        exit();
    }
}

$_SESSION['last_activity'] = time();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity</title>
</head>

<body>
    <p>Your session is active</p>

</body>

</html>