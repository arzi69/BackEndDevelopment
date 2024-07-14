<!DOCTYPE html>
<html>

<head>
    <title>Add Library Book</title>
    <link rel="stylesheet" href="../assessment.css">
</head>

<body>
    <h2>Add Library Book</h2>

    <!-- form for getting inputs for adding new library record -->
    <form action="processlibrary.php" method="POST">
        <label>Title:</label>
        <input type="text" name="title" required><br><br>

        <label>Author:</label>
        <input type="text" name="author" required><br><br>

        <label>Isbn:</label>
        <input type="number" name="isbn" required><br><br>

        <label>Available:</label>
        <input type="number" name="available" required><br><br>

        <!-- here we are showing popup by using javascript -->
        <label>Pupil Id:</label>
        <input type="number" name="pupil_id" id="pupil_id" required readonly>
        <button type="button" class="update-class" onclick="openModal()">Select Pupil</button><br><br>

        <input class="add-class" type="submit" value="Add Library Book">
    </form>
    <a href="/assessment/library/librarybook.php">Back to Library Book List</a>
    <a href="/index.php">Back to Home Page</a>

    <!-- modal for showing records in popup -->
    <div id="classModal" class="modal"> 
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Select Pupil</h2>
            <div id="classList">
                <?php
                include '../db_connection.php';

                $sql = "SELECT pupil_id, name, address, medical_info, class_id FROM Pupil"; //retrieving data from pupil table to show in popup
                $result = $conn->query($sql);

                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Pupil ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>MedicalInfo</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr class='class-item' data-id='" . $row["pupil_id"] . "' onclick='selectClass(" . $row["pupil_id"] . ", \"" . $row["name"] . "\")'>";
                                echo "<td>" . $row["pupil_id"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["address"] . "</td>";
                                echo "<td>" . $row["medical_info"] . "</td>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No pupil found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <button class="add-class" onclick="saveClass()">Save</button>
        </div>
    </div>

    <script> // js functions to show, select record and close popup
        var selectedPupilId = null;

        function openModal() {
            document.getElementById("classModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("classModal").style.display = "none";
        }

        function selectClass(id, name) { // for selecting the record
            var items = document.querySelectorAll('.class-item');
            items.forEach(function (item) {
                item.classList.remove('selected');
            });

            var selectedItem = document.querySelector('.class-item[data-id="' + id + '"]');
            selectedItem.classList.add('selected');

            selectedPupilId = id;
        }

        function saveClass() { // for saving the selected record
            if (selectedPupilId !== null) {
                document.getElementById("pupil_id").value = selectedPupilId;
                closeModal();
            } else {
                alert("Please select a class before saving.");
            }
        }

        window.onclick = function (event) {
            var modal = document.getElementById("classModal");
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>


</body>

</html>