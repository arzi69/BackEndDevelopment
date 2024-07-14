<?php
include '../db_connection.php';

// query for getting data from library table with pupil table using join.
$sql = "SELECT l.book_id, l.title, l.author, l.isbn, l.available, p.name 
        FROM Library_Book l
        LEFT JOIN Pupil p ON l.pupil_id = p.pupil_id";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Library Book List</title>
    <link rel="stylesheet"  href="../assessment.css">
</head>

<body>
    <h2>Library Book List</h2>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Available</th>
                <th>Pupil Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) { //looping the fetched data from db.
                echo "<tr>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["author"] . "</td>";
                echo "<td>" . $row["isbn"] . "</td>";
                echo "<td>" . $row["available"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>";
                echo "<a class='update-class' href='updatelibrary.php?book_id=" . $row["book_id"] . "'>Update</a>";
                echo "<form action='processdeletelibrary.php' method='POST' style='display:inline;'>";
                echo "<input type='hidden' name='book_id' value='" . $row["book_id"] . "'>";
                echo "<input type='submit' class='btn-delete' value='Delete'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No library books found</td></tr>";
            }
            ?>
        </tbody>
    </table>

   <a class="add-class" href="/assessment/library/addlibrary.php">Add New Library Book</>
   <a href="/index.php">Back to Home Page</a>
</body>
</html>

<?php
$conn->close();
?>
