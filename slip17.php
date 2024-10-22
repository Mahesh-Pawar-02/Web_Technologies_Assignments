<?php
$students = array("Sagar" => "31", "Vicky" => "41", "Leena" => "39", "Ramesh" => "40");

echo "<h3>Original Array:</h3>";
print_r($students);

asort($students); 
echo "<h3>Ascending Order Sort by Value:</h3>";
print_r($students);

ksort($students); 
echo "<h3>Ascending Order Sort by Key:</h3>";
print_r($students);


arsort($students); 
echo "<h3>Descending Order Sort by Value:</h3>";
print_r($students);


krsort($students); 
echo "<h3>Descending Order Sort by Key:</h3>";
print_r($students);
?>
