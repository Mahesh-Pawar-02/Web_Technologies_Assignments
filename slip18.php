<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Array Operations</title>
</head>
<body>
    <h2>Menu Driven Program for Associative Array Operations</h2>
    <form method="POST">
        <label>Select an operation:</label><br>
        <input type="radio" name="operation" value="reverse"> Reverse the order of key-value pairs<br>
        <input type="radio" name="operation" value="random_traverse"> Traverse elements in random order<br>
        <input type="radio" name="operation" value="convert_vars"> Convert array elements into individual variables<br>
        <input type="radio" name="operation" value="display"> Display elements of the array<br><br>
        <input type="submit" name="submit" value="Perform Operation">
    </form>

    <?php
    if (isset($_POST['submit']) && isset($_POST['operation'])) 
    {
        $assoc_array = array("name" => "John","age" => 30,"country" => "USA");

        function reverse_array($array) 
        {
            $reversed_array = array_flip($array);
            return $reversed_array;
        }
        function traverse_random($array) 
        {
            $keys = array_keys($array);
            shuffle($keys);
            foreach ($keys as $key) {
                echo $key . ": " . $array[$key] . "<br>";
            }
        }

        function convert_to_variables($array) 
        {
            foreach ($array as $key => $value) 
            {
                global $$key;
                $$key = $value;
                echo "Variable '$key' with value: $$key<br>";
            }
        }

        function display_array($array) 
        {
            foreach ($array as $key => $value) 
            {
                echo $key . ": " . $value . "<br>";
            }
        }

        $operation = $_POST['operation'];
        switch ($operation) 
        {
            case "reverse":
                $reversed_array = reverse_array($assoc_array);
                echo "<h3>Reversed Array:</h3>";
                display_array($reversed_array);
                break;
            case "random_traverse":
                echo "<h3>Elements in Random Order:</h3>";
                traverse_random($assoc_array);
                break;
            case "convert_vars":
                echo "<h3>Converted Variables:</h3>";
                convert_to_variables($assoc_array);
                break;
            case "display":
                echo "<h3>Array Elements:</h3>";
                display_array($assoc_array);
                break;
            default:
                echo "Please select a valid operation.";
        }
    }
    ?>
</body>
</html>
