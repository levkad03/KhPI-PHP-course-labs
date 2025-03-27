<?php

$log_file = "log.txt";

if (!file_exists($log_file)) {
    touch($log_file);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["text"])) {
    $text = trim($_POST["text"]);
    if (!empty($text)) {
        file_put_contents($log_file, $text . "\n", FILE_APPEND);
        echo "Text was written.<br>";
    } else {
        echo "Error";
    }
}

echo "<h2>Saved text:</h2>";
if (file_exists($log_file)) {
    echo nl2br(htmlspecialchars(file_get_contents($log_file)));
} else {
    echo "File is empty";
}
