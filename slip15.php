<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_string = $_POST['input_string'];
    $operation = $_POST['operation'];

    echo "<h3>Original String: $input_string</h3>";

    switch ($operation) {
        case "first5words":
            $words = explode(" ", $input_string);
            $first5words = implode(" ", array_slice($words, 0, 5));
            echo "<h3>First 5 Words: $first5words</h3>";
            break;

        case "tolowercase":
            $lowercase = strtolower($input_string);
            $titlecase = ucwords($lowercase);
            echo "<h3>Lowercase: $lowercase</h3>";
            echo "<h3>Title Case: $titlecase</h3>";
            break;

        case "padwithstars":
            $padded_string = str_pad($input_string, strlen($input_string) + 4, "*", STR_PAD_BOTH);
            echo "<h3>Padded String: $padded_string</h3>";
            break;

        case "removeleadingspaces":
            $trimmed_string = ltrim($input_string);
            echo "<h3>String after removing leading spaces: '$trimmed_string'</h3>";
            break;

        case "reverse":
            $reversed_string = strrev($input_string);
            echo "<h3>Reversed String: $reversed_string</h3>";
            break;

        default:
            echo "<h3>No valid operation selected</h3>";
            break;
    }
}
?>
