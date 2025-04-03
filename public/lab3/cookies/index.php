<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username'])) {
        $username = htmlspecialchars($_POST['username']);
        setcookie('username', $username, time() + (7 * 24 * 60 * 60)); // 7 днів
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
    if (isset($_POST['delete_cookie'])) {
        setcookie('username', '', time() - 3600); // Видалення cookie
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>

<body>
    <?php if (isset($_COOKIE['username'])): ?>
        <h1>Hello, <?php echo htmlspecialchars($_COOKIE['username']); ?>!</h1>
        <form method="post">
            <button type="submit" name="delete_cookie">Delete cookie</button>
        </form>
    <?php else: ?>
        <form method="post">
            <label for="username">Enter your name:</label>
            <input type="text" name="username" id="username" required>
            <button type="submit">Save</button>
        </form>
    <?php endif; ?>
</body>

</html>