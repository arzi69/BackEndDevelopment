<?php

// Connection link
include '../db_connection.php';


$sql = "SELECT class_id, class_name, capacity FROM Class"; // query for retrieving data from Class table
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Class List</title>
    <link rel="stylesheet" href="../assessment.css">
</head>

<body>
    <h2>Class List</h2>

    <!-- class listing, table row -->

    <table>
        <thead>
            <tr>
                <th>Class ID</th>
                <th>Class Name</th>
                <th>Capacity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { // looping the fetched data from table
                    echo "<tr>";
                    echo "<td>" . $row["class_id"] . "</td>";
                    echo "<td>" . $row["class_name"] . "</td>";
                    echo "<td>" . $row["capacity"] . "</td>";
                    echo "<td>";
                    echo "<a class='update-class' href='updateclass.php?class_id=" . $row["class_id"] . "'>Update</a> "; // update button for record update
                    echo "<form action='processdeleteclass.php' method='POST' style='display:inline;'>"; // form for deletion.
                    echo "<input type='hidden' name='class_id' value='" . $row["class_id"] . "'>";
                    echo "<input type='submit' class='btn-delete' value='Delete'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No classes found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a class="add-class" href="/assessment/class/addclass.php">Add New Class</a>
    <a href="/index.php">Back to Home Page</a>
</body>

</html>

<?php
$conn->close();
?>