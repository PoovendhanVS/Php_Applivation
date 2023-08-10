<?php
include 'connect.php';

$get_invoice = $_POST['invoice_id'];

if ($get_invoice) {
    $sql = "SELECT * FROM sales_order where Invoice_Number = '$get_invoice'  ORDER BY id DESC";
    $result = $conn->query($sql);

    if ($result) {
        $count = 1;
        $table_rows = '';

        $result_to_table = $conn->query($sql);

        if ($result_to_table->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $last_id = $row['id'];
                $table_rows .= "<tr>
                    <td data-id='$last_id'>" . $count . "</td>
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
            $table_rows = "<tr><td colspan='8'>No data available.</td></tr>";
        }
    } else {
        echo "<script rel='jsavascript'>";
        echo "alert('Error Found!')"; // Corrected the typo
        echo "</script>";
    }

    $response = [
        'table_rows' => $table_rows,
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = [
        'error' => 'Invalid request method',
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
