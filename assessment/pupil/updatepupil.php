<!DOCTYPE html>
<html>

<head>
    <title>Update Pupil</title>
    <link rel="stylesheet" href="../assessment.css">
</head>

<body>
    <h2>Update Pupil</h2>
    <?php
    if (isset($_GET['pupil_id'])) { // checking if the pupil_id is null or set
        $pupil_id = $_GET['pupil_id'];

        include '../db_connection.php';


        $sql = "SELECT * FROM Pupil WHERE pupil_id=?";
        $rec_fetch = $conn->prepare($sql);
        $rec_fetch->bind_param("i", $pupil_id);
        $rec_fetch->execute();
        $result = $rec_fetch->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!-- form for changing inputs from user -->
            <form action="processupdatepupil.php" method="POST">
                <input type="hidden" name="pupil_id" value="<?php echo $row['pupil_id']; ?>">
                <label for="name">Pupil Name:</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

                <label for="medical_info">Medical Info:</label>
                <input type="text" name="medical_info" value="<?php echo $row['medical_info']; ?>" required><br><br>

                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br><br>

                <input type="hidden" name="class_id" value="<?php echo $row['class_id']; ?>" required><br><br>

                <input class="updateButton" type="submit" value="Update Pupil">
            </form>

            <?php
        } else {
            echo "pupil not found.";
        }

        $rec_fetch->close();
        $conn->close();
    } else {
        echo "No pupil ID provided.";
    }
    ?>
    <a href="/assessment/pupil/pupil.php">Back to Pupil List</a>
    <a href="/index.php">Back to Home Page</a>
</body>

</html>