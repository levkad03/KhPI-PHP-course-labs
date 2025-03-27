<?php

$upload_dir = 'uploads/';

if (!is_dir($upload_dir)) {
    die("The directory does not exist.");
}

$files = scandir($upload_dir);
$files = array_diff($files, array('.', '..'));

echo "<h2>Uploaded Files</h2>";
if (empty($files)) {
    echo "<p>No files uploaded yet.</p>";
} else {
    echo "<ul>";
    foreach ($files as $file) {
        echo "<li><a href='$upload_dir$file'>$file</a></li>";
    }
    echo "</ul>";
}
