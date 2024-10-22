<?php
$conn = new mysqli("localhost","root","root123","slip26");
if ($conn->connect_error) {
    echo "An error occurred during connection";
} else {
    echo "Connection successful<br>";

    if (isset($_POST['t1'])) {
        $a = $_POST['t1'];

        $s1 = $conn->query("SELECT d.doc_no, d.dname, d.address, d.city, d.area 
                               FROM doctor d
                               inner JOIN dochos dh ON d.doc_no = dh.doc_no
                               inner join hospital h on dh.hosp_no=h.hosp_no
                               WHERE h.hname = '$a'"); 

        if ($s1->num_rows > 0) {
            echo "<table border='3'>";
            echo "<tr><th>Doctor No</th><th>Name</th><th>Address</th><th>City</th><th>Area</th></tr>";
            
            while ($r = $s1->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$r['doc_no']}</td>";
                echo "<td>{$r['dname']}</td>";
                echo "<td>{$r['address']}</td>";
                echo "<td>{$r['city']}</td>";
                echo "<td>{$r['area']}</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No doctors found for the specified hospital.";
        }
    }
}
?>