<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queue Operations</title>
</head>
<body>
    <h2>Queue Operations</h2>

    <?php
    session_start();
    if (!isset($_SESSION['queue'])) 
    {
        $_SESSION['queue'] = [];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (isset($_POST['insert'])) 
        {
            $element = trim($_POST['element']);
            if ($element !== "") {
                array_push($_SESSION['queue'], $element);
            }
        } elseif (isset($_POST['delete'])) 
        {
            if (!empty($_SESSION['queue'])) 
            {
                array_shift($_SESSION['queue']);
            }
        }
    }
    ?>

    <form method="POST">
        <label for="element">Enter an element:</label><br>
        <input type="text" id="element" name="element" required><br><br>

        <input type="submit" name="insert" value="Insert into Queue">
        <input type="submit" name="delete" value="Delete from Queue">
    </form>

    <h3>Current Queue:</h3>
    <ul>
        <?php
        foreach ($_SESSION['queue'] as $item) 
        {
            echo "<li>" . htmlspecialchars($item) . "</li>";
        }
        ?>
    </ul>

    <?php
    if (isset($_POST['insert']) && !empty($_SESSION['queue'])) 
    {
        echo "<p style='color:green;'>Element '{$element}' inserted into the queue.</p>";
    } 
    elseif (isset($_POST['delete'])) 
    {
        if (empty($_SESSION['queue'])) 
        {
            echo "<p style='color:red;'>Queue is empty. Nothing to delete.</p>";
        } 
        else 
        {
            echo "<p style='color:green;'>Element deleted from the queue.</p>";
        }
    }
    ?>
</body>
</html>
