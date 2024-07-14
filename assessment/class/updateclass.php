<!DOCTYPE html>
<html>

<head>
    <title>Update Class</title>
    <link rel="stylesheet" href="../assessment.css">
</head>

<body>
    <h2>Update Class</h2>
    <?php
    if (isset($_GET['class_id'])) { // check if class_id is set or null.
        $class_id = $_GET['class_id'];

        // Connection link
        include '../db_connection.php';

        // class updating process
        $sql = "SELECT * FROM Class WHERE class_id=$class_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!-- form for updating class record -->
            <form action="processupdateclass.php" method="POST">
                <input type="hidden" name="class_id" value="<?php echo $row['class_id']; ?>">

                <label for="class_Name">Class Name:</label>
                <input type="text" name="class_Name" value="<?php echo $row['class_name']; ?>" required><br><br>

                <label for="capacity">Capacity:</label>
                <input type="number" name="capacity" value="<?php echo $row['capacity']; ?>" required><br><br>

                <input class="updateButton" type="submit" value="Update Class">
            </form>
            <?php
        } else {
            echo "Class not found.";
        }

        $conn->close();
    } else {
        echo "No class ID provided.";
    }
    ?>
    <br>
    <a href="/assessment/class/class.php">Back to Class List</a>
    <a href="/index.php">Back to Home Page</a>
</body>

</html>