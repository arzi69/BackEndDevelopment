<?php
include '../db_connection.php';

// sql query to get data from pupil, class and pupil_parent by usings joins.
$sql = "SELECT p.pupil_id, p.name, p.address, p.medical_info,
               c.class_name, pa.name AS parent_name
        FROM Pupil p
        LEFT JOIN Class c ON p.class_id = c.class_id
        LEFT JOIN Pupil_Parent pp ON p.pupil_id = pp.pupil_id
        LEFT JOIN Parent pa ON pp.parent_id = pa.parent_id";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Pupil List</title>
    <link rel="stylesheet"  href="../assessment.css">
</head>
<body>
     <h2>Pupil List</h2>

        <table>
        <thead>
            <tr>
                <th>Pupil ID</th>
                <th>Name</th>
                <th>Address</th>
                <th>MedicalInfo</th>
                <th>Class Name</th>
                <th>Parent Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { //looping the fetched data from sql query result
                echo "<tr>";
                echo "<td>" . $row["pupil_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["medical_info"] . "</td>";
                echo "<td>" . $row["class_name"] . "</td>";
                echo "<td>" . $row["parent_name"] . "</td>";
                echo "<td>";
                echo "<a class='update-class' href='updatepupil.php?pupil_id=" . $row["pupil_id"] . "'>Update</a>"; // update button to navigate to the updatepupil.php
                echo "<form action='/assessment/pupil/processdeletepupil.php' method='POST' style='display:inline;'>";
                echo "<input type='hidden' name='pupil_id' value='" . $row["pupil_id"] . "'>";
                echo "<input type='submit' class='btn-delete' value='Delete'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No pupil found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <a class="add-class" href="/assessment/pupil/addpupil.php">Add New Pupil</a>
    <a href="/index.php">Back to Home Page</a>
</body>
</html>

<?php
$conn->close();
?>
