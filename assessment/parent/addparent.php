<!DOCTYPE html>
<html>
<head>
    <title>Add Parent</title>
    <link rel="stylesheet"  href="../assessment.css">
</head>
<body>
    <h2>Add Parent</h2>
    <!--form to get inputs to post data in parent table  -->
    <form action="processparent.php" method="POST">
        <label>Parent:</label>
        <input type="text" name="name" required><br><br>
        
        <label>Address:</label>
        <input type="text" name="address" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Telephone:</label>
        <input type="number" name="telephone" required><br><br>
        
        <input class="add-class" type="submit" value="Add Parent">
    </form>
    <a href="/assessment/parent/parent.php">Back to Parent List</a>
    <a href="/index.php">Back to Home Page</a>
</body>
</html>