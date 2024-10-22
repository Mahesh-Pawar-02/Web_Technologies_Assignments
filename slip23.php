<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stack Operations</title>
</head>
<body>
    <h2>Stack Operations</h2>

    <?php
    session_start();
    if (!isset($_SESSION['stack'])) 
    {
        $_SESSION['stack'] = [];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        if (isset($_POST['insert'])) 
        {
            $element = trim($_POST['element']);
            if ($element !== "") 
            {
                array_push($_SESSION['stack'], $element);
            }
        } 
        elseif (isset($_POST['delete'])) 
        {
            if (!empty($_SESSION['stack'])) 
            {
                array_pop($_SESSION['stack']);
            }
        }
    }
    ?>

    <form method="POST">
        <label for="element">Enter an element:</label><br>
        <input type="text" id="element" name="element" required><br><br>

        <input type="submit" name="insert" value="Push onto Stack">
        <input type="submit" name="delete" value="Pop from Stack">
    </form>

    <h3>Current Stack:</h3>
    <ul>
        <?php

        foreach (array_reverse($_SESSION['stack']) as $item) 
        { 
            echo "<li>" . htmlspecialchars($item) . "</li>";
        }
        ?>
    </ul>

    <?php
    if (isset($_POST['insert'])) 
    {
        echo "<p style='color:green;'>Element '{$element}' pushed onto the stack.</p>";
    } 
    elseif (isset($_POST['delete'])) 
    {
        if (empty($_SESSION['stack'])) 
        {
            echo "<p style='color:red;'>Stack is empty. Nothing to pop.</p>";
        } 
        else 
        {
            echo "<p style='color:green;'>Element popped from the stack.</p>";
        }
    }
    ?>
</body>
</html>
