<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Append File Content</title>
</head>
<body>
    <h2>Append Content of One File to Another</h2>

    <?php
    $file1 = '';
    $file2 = '';
    $message = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $file1 = trim($_POST['file1']);
        $file2 = trim($_POST['file2']);

        if (file_exists($file1) && is_readable($file1)) 
        {
            $content = file_get_contents($file1);

            if (file_put_contents($file2, $content, FILE_APPEND) !== false) 
            {
                $message = "Content from '{$file1}' has been successfully appended to '{$file2}'.";
            } 
            else 
            {
                $message = "Error: Could not write to '{$file2}'. Please check permissions.";
            }
        } 
        else 
        {
            $message = "Error: The file '{$file1}' does not exist or is not readable.";
        }
    }
    ?>

    <form method="POST">
        <label for="file1">Enter the name of the first file:</label><br>
        <input type="text" id="file1" name="file1" required><br><br>

        <label for="file2">Enter the name of the second file:</label><br>
        <input type="text" id="file2" name="file2" required><br><br>

        <input type="submit" value="Append Content">
    </form>

    <h3>Message:</h3>
    <p><?php echo htmlspecialchars($message); ?></p>
</body>
</html>
