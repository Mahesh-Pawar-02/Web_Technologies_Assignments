<?php

include 'arithmetic_functions.php';

$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$operation = $_POST['operation'];

$result = 0;

switch ($operation) 
{
    case 'add':
        $result = add($num1, $num2);
        break;
    case 'subtract':
        $result = subtract($num1, $num2);
        break;
    case 'multiply':
        $result = multiply($num1, $num2);
        break;
    case 'divide':
        $result = divide($num1, $num2);
        break;
    default:
        $result = "Invalid operation selected.";
        break;
}

echo "<h2>Calculation Result</h2>";
echo "<p>First Number: $num1</p>";
echo "<p>Second Number: $num2</p>";
echo "<p>Operation: $operation</p>";
echo "<p>Result: $result</p>";
?>
