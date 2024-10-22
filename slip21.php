<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Input High Temperatures</title>
</head>
<body>
    <h2>High Temperatures Input</h2>
    <form method="POST">
        <label for="temperatures">Enter 15 high temperatures (comma-separated):</label><br>
        <input type="text" id="temperatures" name="temperatures" required placeholder="e.g. 65,70,75,80,82,85,88,90,78,74,73,69,66,77,83"><br><br>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    if (isset($_POST['submit'])) 
    {
        $input_temps = $_POST['temperatures'];
        
        $high_temperatures = array_map('trim', explode(',', $input_temps));

        if (count($high_temperatures) !== 15) 
        {
            echo "<p style='color:red;'>Please enter exactly 15 temperatures.</p>";
        } 
        else 
        {
            $high_temperatures = array_map('intval', $high_temperatures);

            $average_temp = array_sum($high_temperatures) / count($high_temperatures);

            $warmest_temps = array_slice(array_sort($high_temperatures), 0, 5);

            echo "<h3>Average High Temperature: " . round($average_temp, 2) . "°F</h3>";
            echo "<h3>Five Warmest High Temperatures:</h3>";
            echo "<ul>";
            foreach ($warmest_temps as $temp) {
                echo "<li>" . $temp . "°F</li>";
            }
            echo "</ul>";
        }
    }

    function array_sort($array) 
    {
        arsort($array);
        return $array;
    }
    ?>

</body>
</html>
