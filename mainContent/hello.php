<?php

// Check if form is submitted
if(isset($_GET['startDate']) && isset($_GET['endDate'])) {
    // Retrieve start date and end date from form
    $startDate = $_GET['startDate'];
    $endDate = $_GET['endDate'];

    // Prepare SQL statement to fetch filtered expenses
    $sql = "SELECT * FROM daily_expenditure WHERE date BETWEEN '$startDate' AND '$endDate'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table>";
        echo "<tr><th>ID</th><th>Amount</th><th>Description</th><th>Date</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["amount"]."</td><td>".$row["description"]."</td><td>".$row["date"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}

?>