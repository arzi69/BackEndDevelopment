<!DOCTYPE html>
<html>

<head>
    <title>Add Class</title>
    <link rel="stylesheet" href="../assessment.css">
</head>

<body>
    <h2>Add Class</h2>

    <!-- Form to get input for class table -->
    <form action="processclass.php" method="POST">
        <label>Class:</label>
        <input type="text" name="class_name" required><br><br>

        <label>Capacity:</label>
        <input type="number" name="capacity" required><br><br>

        <input class="add-class" type="submit" value="Add Class">
    </form>
    <a href="/assessment/class/class.php">Back to Class List</a>
    <a href="/index.php">Back to Home Page</a>
</body>

</html>