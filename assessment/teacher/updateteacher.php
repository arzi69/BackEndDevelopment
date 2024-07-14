<!DOCTYPE html>
<html>

<head>
    <title>Update Teacher</title>
    <link rel="stylesheet" href="../assessment.css">
</head>

<body>
    <h2>Update Teacher</h2>
    <?php
    if (isset($_GET['teacher_id'])) { //checking if value is null or set
        $teacher_id = $_GET['teacher_id'];

        include '../db_connection.php';

        $sql = "SELECT * FROM Teacher WHERE teacher_id=?";
        $select_rec = $conn->prepare($sql);
        $select_rec->bind_param("i", $teacher_id);
        $select_rec->execute();
        $result = $select_rec->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!-- form for updating/changing the record by user -->
            <form action="processupdateteacher.php" method="POST">
                <input type="hidden" name="teacher_id" value="<?php echo $row['teacher_id']; ?>">

                <label for="name">Teacher Name:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required><br><br>

                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo htmlspecialchars($row['address']); ?>" required><br><br>

                <label for="phone_number">Phone Number:</label>
                <input type="text" name="phone_number" value="<?php echo htmlspecialchars($row['phone_number']); ?>"
                    required><br><br>

                <label for="annual_salary">Annual Salary:</label>
                <input type="number" name="annual_salary" value="<?php echo htmlspecialchars($row['annual_salary']); ?>"
                    required><br><br>

                <label for="background_check">Background Check:</label>
                <input type="text" name="background_check" value="<?php echo htmlspecialchars($row['background_check']); ?>"
                    required><br><br>

                <input class="updateButton" type="submit" value="Update Teacher">
            </form>
            <?php
        } else {
            echo "Teacher not found.";
        }

        $select_rec->close();
        $conn->close();
    } else {
        echo "No teacher ID provided.";
    }
    ?>
    <br>
    <a href="/assessment/teacher/teacher.php">Back to Teacher List</a>
    <a href="/index.php">Back to Home Page</a>
</body>

</html>