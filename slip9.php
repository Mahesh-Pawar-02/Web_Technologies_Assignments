<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $string1 = $_POST['string1'];
    $separator = $_POST['separator'];
    $choice = $_POST['choice'];
    $new_separator = $_POST['newsep'];

    echo "Original String: $string1.<br>";

    switch ($choice) 
    {
        case 1: 
            if (!empty($separator)) 
            {
                $split_string = explode($separator, $string1);
                echo "Separated string is:<br>";
                print_r($split_string);
            } 
            else 
            {
                echo "Please select a separator for splitting the string.<br>";
            }
            break;

        case 2:
            if (!empty($separator) && !empty($new_separator)) 
            {
                $replaced_string = str_replace($separator, $new_separator, $string1);
                echo "Replaced string is: $replaced_string";
            } 
            else 
            {
                echo "Please select both a separator and a new separator for replacement.<br>";
            }
            break;

        case 3: 
            if (!empty($separator)) 
            {
                $split_string = explode($separator, $string1);
                $last_word = end($split_string);
                echo "The last word in the string is: $last_word";
            } 
            else 
            {
                echo "Please select a separator to find the last word.<br>";
            }
            break;

        default:
            echo "Invalid choice selected.<br>";
            break;
    }
}
?>
