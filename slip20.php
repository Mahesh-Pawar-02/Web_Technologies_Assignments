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
        <label>Enter an associative array (JSON format):</label><br>
        <textarea name="assoc_array" rows="5" cols="50" required></textarea><br><br>

        <h3>Select an operation:</h3>
        <input type="radio" name="operation" value="split" required> Split array into chunks<br>
        <input type="radio" name="operation" value="sort"> Sort array by values without changing keys<br>
        <input type="radio" name="operation" value="filter"> Filter even elements from the array<br><br>

        <div id="chunk_size_input" style="display:none;">
            <label>Enter chunk size:</label><br>
            <input type="number" name="chunk_size" min="1"><br><br>
        </div>

        <input type="submit" name="submit" value="Perform Operation">
    </form>

    <?php
    if (isset($_POST['submit']) && isset($_POST['operation'])) 
    {
        $assoc_array = json_decode($_POST['assoc_array'], true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            echo "<p style='color:red;'>Invalid JSON format! Please enter a valid associative array in JSON format.</p>";
        } 
        else 
        {
            $operation = $_POST['operation'];

            switch ($operation) 
            {
                case "split":
                    if (isset($_POST['chunk_size'])) 
                    {
                        $chunk_size = intval($_POST['chunk_size']);
                        if ($chunk_size > 0) 
                        {
                            $chunks = array_chunk($assoc_array, $chunk_size, true);
                            echo "<h3>Array Split into Chunks:</h3>";
                            echo "<pre>" . print_r($chunks, true) . "</pre>";
                        } 
                        else 
                        {
                            echo "<p style='color:red;'>Please enter a valid chunk size greater than 0.</p>";
                        }
                    }
                    break;

                case "sort":
                    asort($assoc_array); 
                    echo "<h3>Array Sorted by Values:</h3>";
                    echo "<pre>" . print_r($assoc_array, true) . "</pre>";
                    break;

                case "filter":
                    $filtered_array = array_filter($assoc_array, function($value) {
                        return $value % 2 === 0;
                    });
                    echo "<h3>Filtered Even Elements:</h3>";
                    echo "<pre>" . print_r($filtered_array, true) . "</pre>";
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
                const chunkSizeInput = document.getElementById("chunk_size_input");
                if (event.target.value === "split") 
                {
                    chunkSizeInput.style.display = "block";
                } 
                else 
                {
                    chunkSizeInput.style.display = "none";
                }
            });
        });
    </script>
</body>
</html>
