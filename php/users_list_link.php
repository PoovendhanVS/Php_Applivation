    <?php

    include 'connect.php';
    $sql = "SELECT id, User_Name, Email_ID, Password FROM sign_up";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      // Start the table structure outside the loop
      echo "<table id='example' class='table table-striped mdl-data-tabl row-border' style='width:100%'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Eamil address</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";

      // Loop through each row and output data in the same table
      $count = 1;
      while ($row = $result->fetch_assoc()) {
        $user_id = $row['id'];
        echo "<tr>
        <td>" . $count . "</td>
        <td>" . $row['User_Name'] . "</td>
        <td>" . $row['Email_ID'] . "</td>
        <td>" . $row['Password'] . "</td>
        <td style='width:200px'><a class='button-look-edit' title='edit' href='update_user_id.php?id=" . $row['id'] . "'><img src='img/edit.png' width='20px'></a>
        <a class='button-look-del' title='delete'  onclick='confirmDelete($user_id)' ><img src='img/delete.png' width='20px'></a></td>
        </tr>";
        $count++;
      }

      // End the table structure after the loop
      echo "</tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email address</th>
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
