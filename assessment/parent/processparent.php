<?php
include '../db_connection.php';


$Name = $_POST['name']; // getting inputs from addparent.php form
$Address = $_POST['address'];
$Email = $_POST['email'];
$Telephone = $_POST['telephone'];

$sql = "INSERT INTO Parent (name, address, email, telephone) VALUES ('$Name', '$Address', '$Email', '$Telephone')"; // insertion query

if ($conn->query($sql) === TRUE) { // checking if query works fine.
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Parent</title>
    <link rel="stylesheet" href="../assessment.css">
</head>
<body>
<br>
<a href="/assessment/parent/addparent.php">Add Another Parent</a><br>
<a href="/assessment/parent/parent.php">Back to Parent List</a>
<a href="/index.php">Back to Home Page</a>
</body>
</html>