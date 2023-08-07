<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['my_id'];
    include 'connect.php';
    $sql = "SELECT * FROM sales_order WHERE id='$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $response = [
        'item_type' => $row['Item_Type'],
        'item_code' => $row['Item_Code'],
        'item_rate' => $row['Item_Rate'],
        'Quentity' => $row['Quantity'],
        'Total' => $row['Total'],
        'Get_id' => $row['id'],
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