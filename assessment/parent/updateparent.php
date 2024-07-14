<!DOCTYPE html>
<html>

<head>
    <title>Update Parent</title>
    <link rel="stylesheet" href="../assessment.css">
</head>

<body>
    <h2>Update Parent</h2>
    <?php
    if (isset($_GET['parent_id'])) { //checking if parent_id is null or set.
        $parent_id = $_GET['parent_id'];

        include '../db_connection.php';


        $sql = "SELECT * FROM Parent WHERE parent_id=$parent_id"; // getting that record which is about to be updated.
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!-- form to get inputs from user -->
            <form action="processupdateparent.php" method="POST"> 
                <input type="hidden" name="parent_id" value="<?php echo $row['parent_id']; ?>">
                <label for="name">Parent Name:</label>
                <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

                <label for="address">Address:</label>
                <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br><br>

                <label for="email">Email:</label>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

                <label for="telephone">Telephone:</label>
                <input type="number" name="telephone" value="<?php echo $row['telephone']; ?>" required><br><br>

                <input class="updateButton" type="submit" value="Update Parent">
            </form>
            <?php
        } else {
            echo "Parent not found.";
        }

        $conn->close();
    } else {
        echo "No parent ID provided.";
    }
    ?>
    <a href="/assessment/parent/parent.php">Back to Parent List</a>
    <a href="/index.php">Back to Home Page</a>
</body>

</html>