<?php
session_start();
$valid_users = [
    'admin' => '1234',
    'user' => 'password'
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    if (isset($_POST['login'], $_POST['password'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (isset($valid_users[$login]) && $valid_users[$login] === $password) {
            $_SESSION['user'] = $login;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            $error = "Wrong login or password!";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>

<body>
    <?php if (isset($_SESSION['user'])): ?>
        <h1>Hello, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
        <form method="post">
            <button type="submit" name="logout">Logout</button>
        </form>
    <?php else: ?>
        <form method="post">
            <label for="login">Login:</label>
            <input type="text" name="login" id="login" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <button type="submit">Log in</button>
        </form>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <?php endif; ?>
</body>

</html>