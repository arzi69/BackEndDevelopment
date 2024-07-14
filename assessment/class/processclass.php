<?php

// Connection link
include '../db_connection.php';


$Class_Name = $_POST['class_name']; // getting input from addclass.php's form
$Capacity = $_POST['capacity'];

$sql = "INSERT INTO Class (class_name, capacity) VALUES ('$Class_Name', '$Capacity')"; // insertion into class table

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add Class</title>
    <link rel="stylesheet" href="../assessment.css">
</head>

<body>
    <br>
    <a href="/assessment/class/addclass.php">Add Another Class</a><br>
    <a href="/assessment/class/class.php">Back to Class List</a>
    <a href="/index.php">Back to Home Page</a>
</body>

</html>