<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chess Board</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }
        td {
            width: 60px;
            height: 60px;
        }
        .black {
            background-color: black;
        }
        .white {
            background-color: white;
        }
    </style>
</head>
<body>

<h2 style="text-align: center;">Chess Board using PHP & CSS</h2>

<table border="1">
    <?php
    for ($row = 1; $row <= 8; $row++) {
        echo "<tr>";
        for ($col = 1; $col <= 8; $col++) {
            $cellColor = ($row + $col) % 2 == 0 ? 'white' : 'black';
            echo "<td class='$cellColor'></td>";
        }
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
