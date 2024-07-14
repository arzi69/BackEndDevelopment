<?php
include '../db_connection.php';

// sql query to retreive data from Teacher and class by using join
$sql = "SELECT t.teacher_id, t.name, t.address, t.phone_number, t.annual_salary, t.background_check, c.class_name 
        FROM Teacher t
        LEFT JOIN Class c ON t.class_id = c.class_id";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Teacher List</title>
    <link rel="stylesheet" href="../assessment.css">
</head>

<body>
    <h2>Teacher List</h2>
    <table>
        <thead>
            <tr>
                <th>Teacher ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>PhoneNumber</th>
                <th>Annual Salary</th>
                <th>Background Check</th>
                <th>Class Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) { //looping the fetched data 
                    echo "<tr>";
                    echo "<td>" . $row["teacher_id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    echo "<td>" . $row["annual_salary"] . "</td>";
                    echo "<td>" . $row["background_check"] . "</td>";
                    echo "<td>" . $row["class_name"] . "</td>";
                    echo "<td>";
                    echo "<a class='update-class' href='updateteacher.php?teacher_id=" . $row["teacher_id"] . "'>Update</a>";
                    echo " <form action='processdeleteteacher.php' method='POST' style='display:inline;'>";
                    echo " <input type='hidden' name='teacher_id' value='" . $row["teacher_id"] . "'>";
                    echo " <input type='submit' class='btn-delete' value='Delete'>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No teachers found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <!-- navigation links -->
    <a class="add-class" href="/assessment/teacher/addteacher.php">Add New Teacher</a>
    <a href="/index.php">Back to Home Page</a>
</body>

</html>

<?php
$conn->close();
?>