<?php

$cacheFile = __DIR__ . "/cache/report.html";
$cacheTime = 600;


if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
    readfile($cacheFile);
    exit;
}

sleep(3);

$names = ['John', 'Mike', 'Anne', 'Patty', 'Sam'];
$html = "<table border='1'><tr><th>Name</th><th>Sum</th><th>Date</th></tr>";

for ($i = 0; $i < 1000; $i++) {
    $name = $names[array_rand($names)];
    $sum = rand(100, 10000);
    $date = date("Y-m-d", strtotime("-" . rand(0, 365) . " days"));
    $html .= "<tr><td>$name</td><td>$sum</td><td>$date</td></tr>";
}
$html .= "</table>";

file_put_contents($cacheFile, $html);

echo $html;
