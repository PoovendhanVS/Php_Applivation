<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $invoice_id = $_POST['invoice_id'];
    $my_id = $_POST['my_id'];
    $type = $_POST['type'];
    $code = $_POST['code'];
    $rate = $_POST['rate'];
    $qty = $_POST['qty'];
    $tol = $_POST['tol'];
    include 'connect.php';
    $sql = "UPDATE sales_order SET Item_Type = '$type',  Item_Code = '$code',  Item_Rate =  '$rate', Quantity = '$qty',  Total = '$tol' WHERE id = '$my_id'";
    $result = $conn->query($sql);
        
    if ($result) {
        // $table_rows = 'Bill details ceated successfully!!';
        $count = 1;
        $table_rows = ''; 

        $sql_view = "SELECT * FROM sales_order WHERE Invoice_Number = '". $invoice_id ."' ORDER BY id DESC";


        $result_to_table = $conn->query($sql_view);

        if ($result_to_table->num_rows > 0) {
            // If there are rows returned from the query
            while ($row = $result_to_table->fetch_assoc()) {
                $last_id = $row['id'];
                $table_rows .= "<tr>
                    <td>" . $count . "</td>
                    <td>" . $row['Invoice_Number'] . "</td>
                    <td style='width:200px;'>" . $row['Item_Type'] . "</td>
                    <td>" . $row['Item_Code'] . "</td>
                    <td>" . $row['Item_Rate'] . "</td>
                    <td>" . $row['Quantity'] . "</td>
                    <td>" . $row['Total'] . "</td>
                    <td style='width:200px'>
                    <a class='button-look-edit' title='edit' onclick='UpdateItem($last_id)'>
                    <img src='img/edit.png' width='20px'></a>
                    <a class='button-look-del' title='delete'  onclick='confirmDelete()' >
                    <img src='img/delete.png' width='20px'></a>
                    </td>
                </tr>";
                $count++;
            }
        } else {
            // Handle the case when no rows are returned from the query
            // For example, display a message that no data is available.
            $table_rows = "<tr><td colspan='8'>No data available.</td></tr>";
        }
    }

    $response = [
        'table_rows' => $table_rows, 
    ];

    header('Content-Type: application/json'); // Ensure correct Content-Type header
    echo json_encode($response);

}
else {
    // Handle the case when the request method is not POST
    $response = [
        'error' => 'Invalid request method',
    ];

    header('Content-Type: application/json'); // Ensure correct Content-Type header
    echo json_encode($response);
}

?>