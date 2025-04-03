<?php

session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['product'])) {
        $product = htmlspecialchars($_POST['product']);
        $_SESSION['cart'][] = $product;
    }

    if (isset($_POST['clear_cart'])) {
        setcookie('previous_purchases', json_encode($_SESSION['cart']), time() + (30 * 24 * 60 * 60));
        $_SESSION['cart'] = [];
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}

$previous_purchases = isset($_COOKIE['previous_purchases']) ? json_decode($_COOKIE['previous_purchases'], true) : [];

?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies + Session</title>
</head>

<body>
    <h1>Basket</h1>
    <form method="post">
        <label for="product">Add product:</label>
        <input type="text" name="product" id="product" required>
        <button type="submit">Add</button>
    </form>

    <h2>Your products:</h2>
    <ul>
        <?php foreach ($_SESSION['cart'] as $item): ?>
            <li><?php echo htmlspecialchars($item); ?></li>
        <?php endforeach; ?>
    </ul>

    <form method="post">
        <button type="submit" name="clear_cart">Clear basket</button>
    </form>

    <h2>Previous purchases:</h2>
    <ul>
        <?php foreach ($previous_purchases as $item): ?>
            <li><?php echo htmlspecialchars($item); ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>