<?php
include '../db_connection.php';

// checking if values is empty or set
$TeacherID = isset($_POST['teacher_id']) ? $_POST['teacher_id'] : 0; 
$Name = isset($_POST['name']) ? $_POST['name'] : '';
$Address = isset($_POST['address']) ? $_POST['address'] : '';
$PhoneNumber = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
$AnnualSalary = isset($_POST['annual_salary']) ? $_POST['annual_salary'] : '';
$BackgroundCheck = isset($_POST['background_check']) ? $_POST['background_check'] : '';

$sql = "UPDATE Teacher SET name=?, address=?, phone_number=?, annual_salary=?, background_check=? WHERE teacher_id=?";
$rec_update = $conn->prepare($sql); //binding the values with types
$rec_update->bind_param("sssssi", $Name, $Address, $PhoneNumber, $AnnualSalary, $BackgroundCheck, $TeacherID);

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
    <title>Update Teacher</title>
    <link rel="stylesheet" href="../assessment.css">
</head>
<body>
<br>
<a href="/assessment/teacher/teacher.php">Back to Teacher List</a><br>
<a href="/index.php">Back to Home Page</a>
</body>
</html>
