<!DOCTYPE html>
<html>

<head>
    <title>Add Teacher</title>
    <link rel="stylesheet" href="../assessment.css">

</head>

<body>
    <h2>Add Teacher</h2>
    <!-- form for getting inputs from user  -->
    <form action="processteacher.php" method="POST">
        <label>Teacher:</label>
        <input type="text" name="name" required><br><br>

        <label>Address:</label>
        <input type="text" name="address" required><br><br>

        <label>Phone Number:</label>
        <input type="number" name="phone_number" required><br><br>

        <label>Annual Salary:</label>
        <input type="number" name="annual_salary" required><br><br>

        <label>Background Check:</label>
        <input type="text" name="background_check" required><br><br>

        <!-- here we are showing popup for selecting class by using javascript -->
        <label>Class Id:</label>
        <input type="number" name="class_id" id="class_id" required readonly>
        <button type="button" class="update-class" onclick="openModal()">Select Class</button><br><br>

        <input class="add-class" type="submit" value="Add Teacher">
    </form>
    <a href="/assessment/teacher/teacher.php">Back to Teacher List</a>
    <a href="/index.php">Back to Home Page</a>

    <!-- modal for showing the data in class popup -->
    <div id="classModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Select Class</h2>
            <div id="classList">
                <?php

                // db connection
                include '../db_connection.php';


                $sql = "SELECT class_id, class_name, capacity FROM Class"; //sql query to show data in popup
                $result = $conn->query($sql);
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Class ID</th>
                            <th>Class Name</th>
                            <th>Capacity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { //looping the fecthed data from table
                                echo "<tr class='class-item' data-id='" . $row["class_id"] . "' onclick='selectClass(" . $row["class_id"] . ", \"" . $row["class_name"] . "\")'>";
                                echo "<td>" . $row["class_id"] . "</td>";
                                echo "<td>" . $row["class_name"] . "</td>";
                                echo "<td>" . $row["capacity"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No classes found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <button class="add-class" onclick="saveClass()">Save</button>
        </div>
    </div>

    <script> // js functions for open/close popups and showing/selecting data in popups
        var selectedClassId = null;

        function openModal() {
            document.getElementById("classModal").style.display = "block";
        }

        function closeModal() {
            document.getElementById("classModal").style.display = "none";
        }

        function selectClass(id, name) {
            var items = document.querySelectorAll('.class-item');
            items.forEach(function (item) {
                item.classList.remove('selected');
            });

            var selectedItem = document.querySelector('.class-item[data-id="' + id + '"]');
            selectedItem.classList.add('selected');

            selectedClassId = id;
        }

        function saveClass() {
            if (selectedClassId !== null) {
                document.getElementById("class_id").value = selectedClassId;
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