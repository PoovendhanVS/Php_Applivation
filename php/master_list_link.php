<?php

    include 'connect.php';
    $sql = "SELECT * FROM customer_creation";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      // Start the table structure outside the loop
      echo "<table id='example' class='table table-striped table-bordered' style='width:100%; font-size:14px;'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer_Name</th>
                    <th>Gender</th>
                    <th>Date_of_Join</th>
                    <th>Company_Name</th>
                    <th>GST</th>
                    <th>Unique_ID</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>View</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>";
      // Loop through each row and output data in the same table
      $count = 1;
      while ($row = $result->fetch_assoc()) {
        $my_id = $row['id'];

        $addressComponents = array(
          $row['Building_Number'],
          $row['Street'],
          $row['Area'],
          $row['City'],
          $row['State'],
          $row['Country'],
          $row['Pincode']
      );
      
      // Filter out empty components
      $addressComponents = array_filter($addressComponents);
      
      // Join the address components with a comma separator
      $address = implode(', ', $addressComponents);

        echo "<tr>
        <td>" . $count . "</td>
        <td>" . $row['Customer_Name'] . "</td>
        <td>" . $row['Gender'] . "</td>
        <td>" . $row['Date_of_join'] . "</td>
        <td>" . $row['Company_Name'] . "</td>
        <td>" . $row['GST'] . "</td>
        <td>" . $row['Unique_ID'] . "</td>
        <td>" . $address . '.' . "</td>

        <td  class='popup' style='text-align:center;'>" .  "<a ><img style='width:25px;height:25px;text-align:center;' src='" . $row['Photo'] . "'></a>" . "</td>

        <td>
        <a class='button-look-view' title='view' href='customer_creation_view.php?id=" . $row['id'] . "'>
        <img src='img/file.png' width='20px'></a></td>

        <td style='text-align:center;'>
        <a class='button-look-edit' title='edit' href='customer_creation_update.php?id=" . $row['id'] . "'>
        <img src='img/edit.png' width='20px'></a>
        <a class='button-look-del' title='delete' onclick='confirmDelete($my_id)'>
        <img src='img/delete.png' width='20px'></a></td>
        
        </tr>";
        $count++;
      }
      // End the table structure after the loop
      echo "</tbody>
            <tfoot>
                <tr>
                <th>ID</th>
                <th>Customer_Name</th>
                <th>Gender</th>
                <th>Date_of_Join</th>
                <th>Company_Name</th>
                <th>GST</th>
                <th>Unique_ID</th>
                <th>Address</th>
                <th>Photo</th>
                <th>View</th>
                <th>Action</th>
                </tr>
            </tfoot>
        </table>";
    } else {
      echo "0 results";
    }

    $conn->close();
    ?>
