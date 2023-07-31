    <?php
    include 'connect.php';
    $sql = "SELECT id, User_Name, Password FROM sign_up";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Start the table structure outside the loop
      echo "<table id='example' class='table table-striped' style='width:100%'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";

      // Loop through each row and output data in the same table
      while ($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>" . $row['id'] . "</td>
        <td>" . $row['User_Name'] . "</td>
        <td>" . $row['Password'] . "</td>
        <td style='width:200px'><a class='button-look-edit' title='edit' href='update_user_id.php?id=" . $row['id'] . "'><img src='img/edit.png' width='20px'></a>
        <a class='button-look-del' title='delete'  href='delete_user_id.php?id=" . $row['id'] . "' ><img src='img/delete.png' width='20px'></a></td>
        </tr>";
    
      }

      // End the table structure after the loop
      echo "</tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>";
    } else {
      echo "0 results";
    }

    $conn->close();
    ?>
