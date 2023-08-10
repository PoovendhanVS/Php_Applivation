<?php
include 'connect.php';

$id = $_POST['ids'];
$invoice = $_POST['invoice'];


$sql = "DELETE FROM sales_order WHERE id = '$id'";
$result = $conn->query($sql);

if ($result) {
    // Use prepared statements to prevent SQL injection
    $sql = "DELETE FROM sales_order WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id); // Assuming 'id' is an integer
    $result = $stmt->execute();

    if ($result) {
        $count = 1;
        $table_rows = '';

        $sql_select = "SELECT * FROM sales_order WHERE  Invoice_Number = '$invoice'  ORDER BY id DESC";
        $result_to_table = $conn->query($sql_select);

        if ($result_to_table->num_rows > 0) {
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
            $table_rows = "<tr><td colspan='8'>No data available.</td></tr>";
        }
    } else {
        echo "<script>";
        echo "alert('Error Found!');"; // Corrected the typo
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
