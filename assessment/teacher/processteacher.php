<?php
include '../db_connection.php';

$Name = $_POST['name']; // getting the data from addteacher.php form
$Address = $_POST['address'];
$PhoneNumber = $_POST['phone_number'];
$AnnualSalary = $_POST['annual_salary'];
$BackgroundCheck = $_POST['background_check'];
$ClassId = $_POST['class_id'];

// binding and prepare
$check_class = "SELECT class_id FROM Class WHERE class_id = ?"; //before inserting the class id check if it exists in class table
$check_class_rec = $conn->prepare($check_class);
$check_class_rec->bind_param("i", $ClassId);
$check_class_rec->execute();
$check_class_rec->store_result();

if ($check_class_rec->num_rows > 0) {
    //binding the values with types.
    $insert_rec = $conn->prepare("INSERT INTO Teacher (name, address, phone_number, annual_salary, background_check, class_id) VALUES (?, ?, ?, ?, ?, ?)");
    $insert_rec->bind_param("sssdsi", $Name, $Address, $PhoneNumber, $AnnualSalary, $BackgroundCheck, $ClassId);

    
    if ($insert_rec->execute() === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insert_rec->error;
    }

    
    $insert_rec->close();
} else {
    echo "Error: Invalid class ID";
}


$check_class_rec->close();
$conn->close(); //closing connection
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
    <link rel="stylesheet" href="../assessment.css">
</head>
<body>
<br>
<a href="/assessment/teacher/addteacher.php">Add Another Teacher</a><br>
<a href="/assessment/teacher/teacher.php">Back to Teacher List</a>
<a href="/index.php">Back to Home Page</a>
</body>
</html>