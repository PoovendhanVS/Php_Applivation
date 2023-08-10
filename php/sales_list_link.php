<?php
include 'connect.php';
$sql = "SELECT * FROM invoice_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start the table structure outside the loop
    echo "<table id='example' class='table table-striped mdl-data-tabl row-border cell-border' style='width:100%; font-size:14px;'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Bill Date</th>
                <th>Customer Name</th>
                <th>Invoice Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>";

    // Loop through each row and output data in the same table
    $count = 1;
    while ($row = $result->fetch_assoc()) {
        $last_id = $row['ID'];
        if ($last_id) {
            $c_id = $row['CUSTOMER_ID'];
            $sql2 = "SELECT * FROM customer_creation WHERE id= '$c_id'";
            $result_2 = $conn->query($sql2);
            
            // Check if the customer query returned results before accessing data
            if ($result_2->num_rows > 0) {
                $row_2 = $result_2->fetch_assoc();
                $c_name = $row_2['Customer_Name'];
            } else {
                $c_name = "N/A"; // Set a default value if no customer found
            }

            echo "<tr>
            <td>" . $count . "</td>
            <td>" . $row['BILL_DATE'] . "</td>
            <td>" . $c_name . "</td>
            <td>" . $row['INVOICE_ID'] . "</td>
            <td style='width:200px'><a class='button-look-edit' title='edit' href='sales_entry_update.php?id=" . $row['ID'] . "'><img src='img/edit.png' width='20px'></a>
            <a class='button-look-del' title='delete'  onclick='confirmDelete($last_id)' ><img src='img/delete.png' width='20px'></a></td>
            </tr>";
            $count++;
        }
    }

    // End the table structure after the loop
    echo "</tbody>
        <tfoot>
          <tr>
              <th>ID</th>
              <th>Bill Date</th>
              <th>Customer Name</th>
              <th>Invoice Number</th>
              <th>Action</th>
          </tr>
        </tfoot>
    </table>";
} else {
    echo "0 results";
}

$conn->close();
?>
