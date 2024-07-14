<?php

include '../db_connection.php';

$Name = $_POST['name']; //getting inputs from addpupil.php form
$Address = $_POST['address'];
$MedicalInfo = $_POST['medical_info'];
$ClassId = $_POST['class_id'];
$ParentId = $_POST['parent_id'];

// prepare statement and binding the values with types to above "?".
$pupil_stmt = $conn->prepare("INSERT INTO Pupil (name, address, medical_info, class_id) VALUES (?, ?, ?, ?)");
$pupil_stmt->bind_param("sssi", $Name, $Address, $MedicalInfo, $ClassId);

if ($pupil_stmt->execute() === TRUE) { //checking if pupil_stmt works then add inserted pupil id into pupil_parent table.
    $pupil_id = $conn->insert_id;

    if ($pupil_parent_stmt = $conn->prepare("INSERT INTO Pupil_Parent (pupil_id, parent_id) VALUES (?, ?)")) {
        $pupil_parent_stmt->bind_param("ii", $pupil_id, $ParentId); //binding for pupil_parent table.

        if ($pupil_parent_stmt->execute() === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error for Pupil_Parent table: " . $pupil_parent_stmt->error;
        }
        $pupil_parent_stmt->close();
    } else {
        echo "Error preparing statement for Pupil_Parent table: " . $conn->error;
    }
    $pupil_stmt->close();
} else {
    echo "Error insertion into Pupil table: " . $pupil_stmt->error;
}

$conn->close(); //closing the connection
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add Pupil</title>
    <link rel="stylesheet" href="../assessment.css">
</head>
<body>
<br>
<a href="/assessment/pupil/addpupil.php">Add Another Pupil</a><br>
<a href="/assessment/pupil/pupil.php">Back to Pupil List</a>
<a href="/index.php">Back to Home Page</a>
</body>
</html>
