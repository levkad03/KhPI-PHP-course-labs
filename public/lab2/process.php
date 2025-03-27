<?php

$upload_dir = 'uploads/';

if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"];

    if (!is_uploaded_file($file["tmp_name"])) {
        die("File is not uploaded");
    }
    $file_name = basename($file["name"]);
    $file_type = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $file_size = $file["size"];

    if (!in_array($file_type, ["jpg", "png", "jpeg"])) {
        die("File type is not allowed");
    }

    if ($file_size > 2 * 1024 * 1024) {
        die("File size is too large");
    }

    $file_name = basename($file["name"]);
    $target_file = $upload_dir . $file_name;

    if (file_exists($target_file)) {
        $unique_name = rand(1000, 9999) . "_" . $file_name;
        $target_file = $upload_dir . $unique_name . '.' . $file_type;
    }

    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        echo "<h2>File uploaded successfully</h2>";
        echo "<img src='$target_file' alt='Uploaded Image'>";
        echo "<p>File Name: $file_name</p>";
        echo "<p>File Type: $file_type</p>";
        echo "<p>File Size: " . round($file_size / 1024, 2) . " kb</p>";
        echo "<p><a href='$target_file' download>Download</a></p>";
    } else {
        echo "<h2>Error uploading file</h2>";
    }
}
