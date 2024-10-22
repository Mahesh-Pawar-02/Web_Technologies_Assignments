<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $str1 = $_POST['str1'];
    $str2 = $_POST['str2'];
    $n = isset($_POST['n']) ? intval($_POST['n']) : 0;
    $ch = $_POST['option'];

    echo "First string: $str1.<br>";
    echo "Second string: $str2.<br>";

    switch($ch) 
    {
        case 'o':
            $pos = strpos($str1, $str2);
            if ($pos === 0) 
            {
                echo "String '$str2' is present at the start of '$str1'.<br>";
            } 
            else 
            {
                echo "String '$str2' is not present at the start of '$str1'.<br>";
            }
            break;

        case 's': 
            $pos = strpos($str1, $str2);
            if ($pos !== false) 
            {
                echo "<br>String '$str2' is present in '$str1' at position $pos.<br>";
                $cnt = substr_count($str1, $str2);
                echo "There are $cnt occurrences of '$str2' in '$str1'.<br>";
            } 
            else 
            {
                echo "There are 0 occurrences of '$str2' in '$str1'.<br>";
            }
            break;

        case 'c':
            if (strcmp($str1, $str2) > 0) 
            {
                echo "String2 sorts before String1.<br>";
            } 
            elseif (strcmp($str1, $str2) == 0) 
            {
                echo "Both strings are equal.<br>";
            } 
            else 
            {
                echo "String1 sorts before String2.<br>";
            }

            if ($n > 0) 
            { 
                if (strncmp($str1, $str2, $n) == 0) 
                {
                    echo "The first $n characters of both strings are equal.<br>";
                } 
                elseif (strncmp($str1, $str2, $n) < 0) 
                {
                    echo "The first $n characters of String1 are less than String2.<br>";
                } 
                else 
                {
                    echo "The first $n characters of String1 are greater than String2.<br>";
                }
            } 
            else 
            {
                echo "Please enter a valid number of characters for comparison.<br>";
            }
            break;

        default:
            echo "Invalid option selected.<br>";
            break;
    }
}
?>
