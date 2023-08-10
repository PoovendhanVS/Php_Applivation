<?php 
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name_id'];
    $invoice_id = $_POST['invoice'];
    $bill_date = $_POST['bill_date'];
    $itemType = $_POST['item_type'];
    $itemCode = $_POST['item_code'];
    $itemRate = $_POST['item_rate'];
    $itemQty = $_POST['item_qty'];
    $total = $_POST['total'];
    
    $sql = "INSERT INTO sales_order 
    (
    Invoice_Number, 
    Bill_Date, 
    Item_Type,  
    Item_Code, 
    Item_Rate, 
    Quantity, 
    Total,
    Name_ID) VALUES
    ('$invoice_id',  
    '$bill_date',
    '$itemType',
    '$itemCode',
    '$itemRate',
    '$itemQty',
    '$total',
    '$name')";

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
                    <td>" . $row['Item_Type'] . "</td>
                    <td>" . $row['Item_Code'] . "</td>
                    <td>" . $row['Item_Rate'] . "</td>
                    <td>" . $row['Quantity'] . "</td>
                    <td>" . $row['Total'] . "</td>
                    <td>
                    <a class='button-look-edit' title='edit' onclick='UpdateItem($last_id)'>
                    <img src='img/edit.png' width='20px'></a>
                    <a class='button-look-del' title='delete'  onclick='confirmDelete($last_id)' >
                        <img src='img/delete.png' width='20px'>
                    </td>
                </tr>";
                $count++;
            }
        } else {
            // Handle the case when no rows are returned from the query
            // For example, display a message that no data is available.
            $table_rows = "<tr><td colspan='8'>No data available.</td></tr>";
        }

    } else {
        echo "<script rel='jsavascript'>";
        echo "alert('Error Found!' )";
        echo "</script>";
    }


    
    // Do whatever you need to do with the data and prepare the response
    $response = [
        'table_rows' => $table_rows, // Include the table rows in the response
    ];

    header('Content-Type: application/json'); // Ensure correct Content-Type header
    echo json_encode($response);
} else {
    // Handle the case when the request method is not POST
    $response = [
        'error' => 'Invalid request method',
    ];

    header('Content-Type: application/json'); // Ensure correct Content-Type header
    echo json_encode($response);
}
?>
