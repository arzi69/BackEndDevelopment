<?php

// Connection link
include '../db_connection.php';

// class updating process

$class_id = $_POST['class_id']; //getting input from updateclass.php form
$class_Name = $_POST['class_Name'];
$capacity = $_POST['capacity'];


$rec_update = $conn->prepare("UPDATE Class SET class_name=?, capacity=? WHERE class_id=?"); //query for updating the record 
$rec_update->bind_param("ssi", $class_Name, $capacity, $class_id); //bind these values with types on above ? respectively.


if ($rec_update->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $rec_update->error;
}

$rec_update->close();
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Class</title>
    <link rel="stylesheet" href="../assessment.css">
</head>

<body>
    <br>
    <a href="/assessment/class/class.php">Back to Class List</a><br>
    <a href="/index.php">Back to Home Page</a>
</body>

</html>