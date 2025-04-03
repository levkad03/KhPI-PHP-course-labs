<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit();
}

$client_ip = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
$script_name = $_SERVER['PHP_SELF'];
$request_method = $_SERVER['REQUEST_METHOD'];
$file_path = __FILE__;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server</title>
</head>

<body>
    <h1>Server information</h1>
    <p><strong>IP-address:</strong> <?php echo htmlspecialchars($client_ip); ?></p>
    <p><strong>Browser:</strong> <?php echo htmlspecialchars($user_agent); ?></p>
    <p><strong>Script name:</strong> <?php echo htmlspecialchars($script_name); ?></p>
    <p><strong>Request method:</strong> <?php echo htmlspecialchars($request_method); ?></p>
    <p><strong>File path:</strong> <?php echo htmlspecialchars($file_path); ?></p>
</body>

</html>