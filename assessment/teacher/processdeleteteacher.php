<?php
include '../db_connection.php'; // db connection

$TeacherID = $_POST['teacher_id'];

$sql = "DELETE FROM Teacher WHERE teacher_id=$TeacherID"; //deletion from teacher

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Teacher</title>
    <link rel="stylesheet" href="../assessment.css">
</head>
<body>
<br>
<a href="/assessment/teacher/teacher.php">Back to Teacher List</a><br>
<a href="/index.php">Back to Home Page</a>
</body>
</html>
