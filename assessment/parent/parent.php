<?php
include '../db_connection.php';

$sql = "SELECT parent_id, name, address, email, telephone FROM Parent"; //retrieving query from parent table
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Parent List</title>
    <link rel="stylesheet"  href="../assessment.css">
</head>
<body>
    <h2>Parent List</h2>

    <table>
        <thead>
            <tr>
                <th>ParentID</th>
                <th>Name</th>
                <th>Address</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
       
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { //looping the fetched data
                echo "<tr>";
                echo "<td>" . $row["parent_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["address"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telephone"] . "</td>";
                echo "<td>";
                echo "<a class='update-class' href='updateparent.php?parent_id=" . $row["parent_id"] . "'>Update</a>";
                echo " <form action='processdeleteparent.php' method='POST' style='display:inline;'>";
                echo " <input type='hidden' name='parent_id' value='" . $row["parent_id"] . "'>";
                echo " <input type='submit' class='btn-delete' value='Delete'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No parents found</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a class="add-class" href="/assessment/parent/addparent.php">Add New Parent</>
    <a href="/index.php">Back to Home Page</a>
</body>
</html>

<?php
$conn->close();
?>
