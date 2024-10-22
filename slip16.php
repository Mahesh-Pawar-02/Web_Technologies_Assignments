<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serial_numbers = $_POST['serial_number'];
    $subject_names = $_POST['subject_name'];
    $marks = $_POST['marks'];

    $total_marks = 0;
    $max_marks = 500; 
    $num_subjects = count($marks);

    echo "<h2>Result Sheet</h2>";
    echo "<table border='1' cellpadding='10'>
            <tr>
                <th>Serial Number</th>
                <th>Subject Name</th>
                <th>Marks</th>
            </tr>";

    for ($i = 0; $i < $num_subjects; $i++) 
    {
        echo "<tr>
                <td>{$serial_numbers[$i]}</td>
                <td>{$subject_names[$i]}</td>
                <td>{$marks[$i]}</td>
            </tr>";
        $total_marks += (int)$marks[$i];
    }

    echo "</table>";

    $percentage = ($total_marks / $max_marks) * 100;

    if ($percentage >= 90) 
    {
        $grade = "A";
    } 
    elseif ($percentage >= 80) 
    {
        $grade = "B";
    } 
    elseif ($percentage >= 70) 
    {
        $grade = "C";
    } 
    elseif ($percentage >= 60) 
    {
        $grade = "D";
    } 
    else 
    {
        $grade = "F";
    }

    echo "<h3>Total Marks: $total_marks / $max_marks</h3>";
    echo "<h3>Percentage: $percentage%</h3>";
    echo "<h3>Grade: $grade</h3>";
}
?>
