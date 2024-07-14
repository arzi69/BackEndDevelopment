<?php
include '../db_connection.php';


$PupilID = $_POST['pupil_id']; //getting inputs from updatepupil.php form
$Name = $_POST['name'];
$Address = $_POST['address'];
$MedicalInfo = $_POST['medical_info'];
$ClassId = $_POST['class_id'];

//binding the values with above "?".
$sql = "UPDATE Pupil SET name=?, address=?, medical_info=?, class_id=? WHERE pupil_id=?";
$rec_update = $conn->prepare($sql);
$rec_update->bind_param("sssii", $Name, $Address, $MedicalInfo, $ClassId, $PupilID);


if ($rec_update->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $rec_update->error;
}

$rec_update->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Pupil</title>
    <link rel="stylesheet" href="../assessment.css">
</head>
<body>
<br>
<!-- navigation links -->
<a href="/assessment/pupil/pupil.php">Back to Pupil List</a><br>
<a href="/index.php">Back to Home Page</a>
</body>
</html>
