<!DOCTYPE html>
<html>

<head>
    <title>Update Library Book</title>
    <link rel="stylesheet" href="../assessment.css">
</head>

<body>
    <h2>Update Library Book</h2>
    <?php
    if (isset($_GET['book_id'])) { // check if variable is set or empty/null
        $book_id = $_GET['book_id'];

        include '../db_connection.php';

        $sql = "SELECT * FROM Library_Book WHERE book_id=$book_id"; //getting record of the particular book
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!-- form to update record -->
            <form action="processupdatelibrary.php" method="POST">
                <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                <label for="title">Title:</label>
                <input type="text" name="title" value="<?php echo $row['title']; ?>" required><br><br>

                <label for="author">Author:</label>
                <input type="text" name="author" value="<?php echo $row['author']; ?>" required><br><br>

                <label for="isbn">Isbn:</label>
                <input type="number" name="isbn" value="<?php echo $row['isbn']; ?>" required><br><br>

                <label for="available">Available:</label>
                <input type="number" name="available" value="<?php echo $row['available']; ?>" required><br><br>

                <input type="hidden" name="pupil_id" value="<?php echo $row['pupil_id']; ?>" required><br><br>

                <input class="updateButton" type="submit" value="Update Library Book">
            </form>
            <?php
        } else {
            echo "Library book not found.";
        }

        $conn->close();
    } else {
        echo "No book ID provided.";
    }
    ?>
    <a href="/assessment/library/librarybook.php">Back to Library Book List</a>
    <a href="/index.php">Back to Home Page</a>
</body>

</html>