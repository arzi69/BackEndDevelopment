<!DOCTYPE html>
<html>

<head>
    <title>Add Pupil</title>
    <link rel="stylesheet" href="../assessment.css">
</head>

<body>
    <h2>Add Pupil</h2>
    <!-- form for grtting inputs from user -->
    <form action="processpupil.php" method="POST">
        <label>Pupil:</label>
        <input type="text" name="name" required><br><br>

        <label>Address:</label>
        <input type="text" name="address" required><br><br>

        <label>Medical Info:</label>
        <input type="text" name="medical_info" required><br><br>

        <!-- here we are showing popup for selecting class by using javascript -->
        <label>Class Id:</label>
        <input type="number" name="class_id" id="class_id" required readonly>
        <button type="button" class="update-class" onclick="openClassModal()">Select Class</button><br><br>

        <!-- here we are showing popup for selecting parent by using javascript -->
        <label>Parent Id:</label>
        <input type="number" name="parent_id" id="parent_id" required readonly>
        <button type="button" class="update-class" onclick="openParentModal()">Select Parent</button><br><br>

        <input class="add-class" type="submit" value="Add Pupil">
    </form>
    <a href="/assessment/pupil/pupil.php">Back to Pupil List</a>
    <a href="/index.php">Back to Home Page</a>

    <!-- modal for showing the data in class popup -->
    <div id="classModal" class="modal"> 
        <div class="modal-content">
            <span class="close" onclick="closeClassModal()">&times;</span> 
            <h2>Select Class</h2>
            <div id="classList">
                <?php
                include '../db_connection.php'; //db connection

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
                            echo "<tr><td colspan='3'>No classes found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <button class="add-class" onclick="saveClass()">Save</button>
        </div>
    </div>

        <!-- modal for showing the data in parent popup -->
    <div id="parentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeParentModal()">&times;</span>
            <h2>Select Parent</h2>
            <div id="parentList">
                <?php
                $sql = "SELECT parent_id, name, address, email, telephone FROM Parent"; //sql query to show data in popup
                $result = $conn->query($sql);
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>ParentID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Telephone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { //looping the fetched data from db
                                echo "<tr class='parent-item' data-id='" . $row["parent_id"] . "' onclick='selectParent(" . $row["parent_id"] . ", \"" . $row["name"] . "\")'>";
                                echo "<td>" . $row["parent_id"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["address"] . "</td>";
                                echo "<td>" . $row["email"] . "</td>";
                                echo "<td>" . $row["telephone"] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No parents found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <button class="add-class" onclick="saveParent()">Save</button>
        </div>
    </div>

    <script> // js functions for open/close popups and showing/selecting data in popups
        var selectedClassId = null;
        var selectedParentId = null;

        function openClassModal() {
            document.getElementById("classModal").style.display = "block";
        }

        function closeClassModal() {
            document.getElementById("classModal").style.display = "none";
        }

        function selectClass(id, name) {
            var items = document.querySelectorAll('.class-item');
            items.forEach(function(item) {
                item.classList.remove('selected');
            });

            var selectedItem = document.querySelector('.class-item[data-id="' + id + '"]');
            selectedItem.classList.add('selected');

            selectedClassId = id;
        }

        function saveClass() {
            if (selectedClassId !== null) {
                document.getElementById("class_id").value = selectedClassId;
                closeClassModal();
            } else {
                alert("Please select a class before saving.");
            }
        }

        function openParentModal() {
            document.getElementById("parentModal").style.display = "block";
        }

        function closeParentModal() {
            document.getElementById("parentModal").style.display = "none";
        }

        function selectParent(id, name) {
            var items = document.querySelectorAll('.parent-item');
            items.forEach(function(item) {
                item.classList.remove('selected');
            });

            var selectedItem = document.querySelector('.parent-item[data-id="' + id + '"]');
            selectedItem.classList.add('selected');

            selectedParentId = id;
        }

        function saveParent() {
            if (selectedParentId !== null) {
                document.getElementById("parent_id").value = selectedParentId;
                closeParentModal();
            } else {
                alert("Please select a parent before saving.");
            }
        }

        window.onclick = function(event) {
            var classModal = document.getElementById("classModal");
            var parentModal = document.getElementById("parentModal");
            if (event.target == classModal) {
                closeClassModal();
            }
            if (event.target == parentModal) {
                closeParentModal();
            }
        }
    </script>

</body>

</html>
