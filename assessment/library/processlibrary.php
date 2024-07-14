<?php
include '../db_connection.php';// db connection


$Title = $_POST['title']; //getting the data from addlibrary.php form
$Author = $_POST['author'];
$ISBN = $_POST['isbn'];
$Available = $_POST['available'];
$PupilId = $_POST['pupil_id'];


$pupil_Id_check = "SELECT pupil_id FROM Pupil WHERE pupil_id = ?"; 
$pupil_rec_check = $conn->prepare($pupil_Id_check);
$pupil_rec_check->bind_param("i", $PupilId); //binding with types
$pupil_rec_check->execute();
$pupil_rec_check->store_result();

if ($pupil_rec_check->num_rows > 0) { // checcking if pupilId exist in pupil table.
    
    $add_rec = $conn->prepare("INSERT INTO Library_Book (title, author, isbn, available, pupil_id) VALUES (?, ?, ?, ?, ?)");
    $add_rec->bind_param("ssssi", $Title, $Author, $ISBN, $Available, $PupilId); // insertion in Library table

    
    if ($add_rec->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $add_rec->error;
    }

    
    $add_rec->close();
} else {
    echo "Error: Invalid Pupil ID";
}


$pupil_rec_check->close();
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
<a href="/assessment/library/addlibrary.php">Add Another Library Book</a><br>
<a href="/assessment/library/librarybook.php">Back to Library Book List</a>
<a href="/index.php">Back to Home Page</a>
</body>
</html>