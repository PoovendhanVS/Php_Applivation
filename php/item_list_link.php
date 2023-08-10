<?php

include 'connect.php';
$sql = "SELECT * FROM item_creation";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Start the table structure outside the loop
  echo "<table id='example' class='table table-striped mdl-data-tabl row-border cell-border' style='width:100%; font-size:14px;'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Type Name</th>
                <th>Type Code</th>
                <th>Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>";

  // Loop through each row and output data in the same table
  $count = 1;
  while ($row = $result->fetch_assoc()) {
    $last_id = $row['id'];
    echo "<tr>
    <td>" . $count . "</td>
    <td>" . $row['Item_Type'] . "</td>
    <td>" . $row['Item_Code'] . "</td>
    <td>" . $row['Price'] . "</td>
    <td>" . $row['Description'] . "</td>
    <td style='width:200px'><a class='button-look-edit' title='edit' href='item_creation_update.php?id=" . $row['id'] . "'><img src='img/edit.png' width='20px'></a>
    <a class='button-look-del' title='delete'  onclick='confirmDelete($last_id)' ><img src='img/delete.png' width='20px'></a></td>
    </tr>";
    $count++;
  }

  // End the table structure after the loop
  echo "</tbody>
        <tfoot>
            <tr>
            <th>ID</th>
            <th>Type Name</th>
            <th>Type Code</th>
            <th>Price</th>
            <th>Description</th>
            <th>Action</th>
            </tr>
        </tfoot>
    </table>";
} else {
  echo "0 results";
}

$conn->close();
?>
