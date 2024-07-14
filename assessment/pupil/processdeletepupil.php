<?php
include '../db_connection.php';

$PupilID = isset($_POST['pupil_id']) ? intval($_POST['pupil_id']) : 0; // checking if pupil_id is not null and convertion into int

$sql = "DELETE FROM Pupil WHERE pupil_id=$PupilID"; //deletion

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
    <title>Delete Pupil</title>
    <link rel="stylesheet" href="../assessment.css">
</head>
<body>
<br>
<!-- links to navigate -->
<a href="/assessment/pupil/pupil.php">Back to Pupil List</a><br> 
<a href="/index.php">Back to Home Page</a>
</body>
</html>
