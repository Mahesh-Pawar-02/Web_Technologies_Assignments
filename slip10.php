<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $num1 = (int)$_POST['num1']; 
    $num2 = (int)$_POST['num2'];
    $operation = $_POST['operation']; 

    switch ($operation) 
    {
        case 'mod':
            echo "Modulus of $num1 and $num2 is: " . mod($num1, $num2);
            break;

        case 'power':
            echo "$num1 raised to the power of $num2 is: " . power($num1, $num2);
            break;

        case 'sum':
            echo "Sum of first $num1 numbers is: " . sum($num1);
            break;

        case 'factorial':
            echo "Factorial of $num2 is: " . factorial($num2);
            break;

        default:
            echo "Invalid operation selected.";
            break;
    }
}

function mod($a, $b) 
{
    return $a % $b;
}

function power($a, $b) 
{
    return pow($a, $b);
}

function sum($n) 
{
    $sum = 0;
    for ($i = 1; $i <= $n; $i++) 
    {
        $sum += $i;
    }
    return $sum;
}

function factorial($n) 
{
    if ($n < 0) 
    {
        return "Invalid input for factorial";
    }
    $fact = 1;
    for ($i = 2; $i <= $n; $i++) 
    {
        $fact *= $i;
    }
    return $fact;
}
?>
