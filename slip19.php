<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Operations</title>
</head>
<body>
    <h2>String Manipulation Program</h2>
    <form method="POST">
        <label>Enter a sentence (big string):</label><br>
        <input type="text" name="big_string" required><br><br>

        <label>Enter a word (small string):</label><br>
        <input type="text" name="small_string" required><br><br>

        <h3>Select an operation:</h3>
        <input type="radio" name="operation" value="delete" required> Delete part of the sentence<br>
        <input type="radio" name="operation" value="insert"> Insert the word in the sentence at a specified position<br>
        <input type="radio" name="operation" value="replace"> Replace part of the sentence with the word<br><br>

        <div id="position_input">
            <label>Enter position:</label><br>
            <input type="number" name="position" min="0" required><br><br>
        </div>

        <div id="length_input" style="display:none;">
            <label>Enter number of characters to remove:</label><br>
            <input type="number" name="length" min="1"><br><br>
        </div>

        <input type="submit" name="submit" value="Perform Operation">
    </form>

    <?php
    if (isset($_POST['submit']) && isset($_POST['operation'])) 
    {
        $big_string = $_POST['big_string'];
        $small_string = $_POST['small_string'];
        $position = intval($_POST['position']);

        if ($position < 0 || $position > strlen($big_string)) 
        {
            echo "<p style='color:red;'>Invalid position! Please enter a valid position within the length of the big string.</p>";
        } 
        else 
        {
            $operation = $_POST['operation'];

            switch ($operation) 
            {
                case "delete":
                    if (isset($_POST['length'])) 
                    {
                        $length = intval($_POST['length']);
                        if ($length > 0 && $position + $length <= strlen($big_string)) {
                            $new_string = substr_replace($big_string, "", $position, $length);
                            echo "<h3>Result after deletion:</h3>";
                            echo "<p>$new_string</p>";
                        } 
                        else 
                        {
                            echo "<p style='color:red;'>Invalid length! Please enter a valid length within the string's bounds.</p>";
                        }
                    }
                    break;

                case "insert":
                    $new_string = substr_replace($big_string, $small_string, $position, 0);
                    echo "<h3>Result after insertion:</h3>";
                    echo "<p>$new_string</p>";
                    break;

                case "replace":
                    if (isset($_POST['length'])) 
                    {
                        $length = intval($_POST['length']);
                        if ($length > 0 && $position + $length <= strlen($big_string)) 
                        {
                            $new_string = substr_replace($big_string, $small_string, $position, $length);
                            echo "<h3>Result after replacement:</h3>";
                            echo "<p>$new_string</p>";
                        } 
                        else 
                        {
                            echo "<p style='color:red;'>Invalid length! Please enter a valid length for replacement.</p>";
                        }
                    }
                    break;

                default:
                    echo "Please select a valid operation.";
                    break;
            }
        }
    }
    ?>

    <script>
        document.querySelectorAll('input[name="operation"]').forEach((elem) => 
        {
            elem.addEventListener("change", function(event) 
            {
                const lengthInput = document.getElementById("length_input");
                if (event.target.value === "delete" || event.target.value === "replace") 
                {
                    lengthInput.style.display = "block";
                } 
                else 
                {
                    lengthInput.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>
