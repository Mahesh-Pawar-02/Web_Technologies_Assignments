<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Operations Menu</title>
</head>
<body>
    <h2>File Operations Menu</h2>

    <?php
    $filename = '';
    $message = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $filename = trim($_POST['filename']);
        $operation = $_POST['operation'];

        if (file_exists($filename)) 
        {
            switch ($operation) 
            {
                case 'type':
                    $message = "The type of file '{$filename}' is: " . mime_content_type($filename);
                    break;

                case 'modification_time':
                    $modTime = date("F d Y H:i:s.", filemtime($filename));
                    $message = "The last modification time of '{$filename}' is: " . $modTime;
                    break;

                case 'size':
                    $size = filesize($filename);
                    $message = "The size of file '{$filename}' is: " . $size . " bytes";
                    break;

                case 'delete':
                    if (unlink($filename)) {
                        $message = "The file '{$filename}' has been deleted.";
                    } else {
                        $message = "Error: The file '{$filename}' could not be deleted.";
                    }
                    break;

                default:
                    $message = "Invalid operation selected.";
                    break;
            }
        } else {
            $message = "Error: The file '{$filename}' does not exist.";
        }
    }
    ?>

    <form method="POST">
        <label for="filename">Enter the filename:</label><br>
        <input type="text" id="filename" name="filename" required><br><br>

        <label for="operation">Select an operation:</label><br>
        <select id="operation" name="operation">
            <option value="type">Display type of file</option>
            <option value="modification_time">Display last modification time of file</option>
            <option value="size">Display the size of file</option>
            <option value="delete">Delete the file</option>
        </select><br><br>

        <input type="submit" value="Perform Operation">
    </form>

    <h3>Message:</h3>
    <p><?php echo nl2br(htmlspecialchars($message)); ?></p>
</body>
</html>
