<?php
// Connection link
include '../db_connection.php';

// delete class process

$ClassID = $_POST['class_id'];

$sql = "DELETE FROM Class WHERE class_id=$ClassID"; //deletion from class table

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {

    echo "You Can't delete this record.";

}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Delete Class</title>
    <link rel="stylesheet" href="../assessment.css">
</head>

<body>
    <br>
    <a href="/assessment/class/class.php">Back to Class List</a><br>
    <a href="/index.php">Back to Home Page</a>
</body>

</html>