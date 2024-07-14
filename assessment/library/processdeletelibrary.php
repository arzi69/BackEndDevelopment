<?php
include '../db_connection.php'; // db connection


$BookID = $_POST['book_id']; //getting the data from class.php deletion form.

$sql = "DELETE FROM Library_Book WHERE book_id=?"; //deletion from library table

$del_record = $conn->prepare($sql);

$del_record->bind_param("i", $BookID); //binding the bookid to above ?


if ($del_record->execute()) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $del_record->error;
}

$del_record->close();
$conn->close();
?>

<!DOCTYPE html>
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
