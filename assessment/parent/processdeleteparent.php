<?php

include '../db_connection.php'; //conenction for db


if (isset($_POST['parent_id'])) { //checking if parent_id valid or null.
    
    $ParentID = intval($_POST['parent_id']); // converting the variable into int

    
    $rec_del = $conn->prepare("DELETE FROM Parent WHERE parent_id = ?"); //deletion from table parent.
    $rec_del->bind_param("i", $ParentID);


    if ($rec_del->execute() === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $rec_del->error;
    }


    $rec_del->close();
} else {
    echo "No Parent ID provided";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Parent</title>
    <link rel="stylesheet" href="../assessment.css">
</head>
<body>
<br>
<a href="/assessment/parent/parent.php">Back to Parent List</a><br>
<a href="/index.php">Back to Home Page</a>
</body>
</html>
