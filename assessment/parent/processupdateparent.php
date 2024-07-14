<?php
include '../db_connection.php';


$ParentID = $_POST['parent_id']; // getting inputs from updateparent.php form
$Name = $_POST['name'];
$Address = $_POST['address'];
$Email = $_POST['email'];
$Telephone = $_POST['telephone'];

$sql = "UPDATE Parent SET name='$Name', address='$Address', email='$Email', telephone='$Telephone' WHERE parent_id=$ParentID"; //updating the record in parent table

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Parent</title>
    <link rel="stylesheet" href="../assessment.css">
</head>
<body>
<br>
<a href="/assessment/parent/parent.php">Back to Parent List</a><br>
<a href="/index.php">Back to Home Page</a>
</body>
</html>