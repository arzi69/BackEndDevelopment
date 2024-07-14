<?php
include '../db_connection.php';

$BookID = $_POST['book_id']; // getting the data from updatelibrary.php form
$Title = $_POST['title'];
$Author = $_POST['author'];
$ISBN = $_POST['isbn'];
$Available = $_POST['available'];
$PupilId = $_POST['pupil_id'];

$sql = "UPDATE Library_Book SET title=?, author=?, isbn=?, available=?, pupil_id=? WHERE book_id=?"; //updating record
$rec_update = $conn->prepare($sql);
$rec_update->bind_param("sssiii", $Title, $Author, $ISBN, $Available, $PupilId, $BookID); //binding

if ($rec_update->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $rec_update->error;
}

$rec_update->close();
$conn->close();
?>

<html>
<head>
    <title>Delete Library Book</title>
    <link rel="stylesheet" href="../assessment.css">
</head>
<body>
<br>
<a href="/assessment/library/librarybook.php">Back to Library Book List</a><br>
<a href="/index.php">Back to Home Page</a>
</body>
</html>