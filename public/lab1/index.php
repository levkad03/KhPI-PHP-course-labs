<?php
// Task 1: outputs "Hello world"
echo "Hello, World! <br>";
echo "<br>";

// Task 2
$str = "some string";
$num = 12;
$float_num = 11.3;
$bool = true;

echo $str . "<br>";
echo $num . "<br>";
echo $float_num . "<br>";
echo $bool . "<br>";

var_dump($str);
var_dump($num);
var_dump($float_num);
var_dump($bool);
echo "<br>";

// Task 3
$str1 = "Hello";
$str2 = "World";

echo $str1 . " " . $str2 . "<br>";
echo "<br>";

// Task 4
$int = 10;

if ($int % 2 == 0) {
    echo "The number is Even <br>";
} else {
    echo "The number is Odd <br>";
}
echo "<br>";

// Task 5
for ($i = 1; $i <= 10; $i++) {
    echo $i . " ";
}
echo "<br>";

$i = 10;
while ($i >= 1) {
    echo $i . " ";
    $i--;
}
echo "<br>";

// Task 6
$arr = [
    "name" => "John",
    "lastname" => "Doe",
    "age" => 30,
    "specialty" => "Software Engineering",
];

echo $arr["name"] . " " . $arr["lastname"] . ", age: " . $arr["age"] . ": " . $arr["specialty"];

?>