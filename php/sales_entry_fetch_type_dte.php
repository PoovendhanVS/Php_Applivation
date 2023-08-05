<?php 
include 'connect.php';
if (isset($_GET['selectedId'])) {
    $type_name = $_GET['selectedId'];
    $sql = "SELECT * FROM item_creation WHERE Item_Type = '". $type_name ."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $response = [
        'type' => $row['Item_Type'],
        'code' =>  $row['Item_Code'], 
        'rate' =>  $row['Price'], 
    ];

    header('Content-Type: application/json'); // Ensure correct Content-Type header
    echo json_encode($response);
} else {
    // Handle the case when 'selectedId' is not set
    $response = [
        'error' => 'selectedId parameter is missing',
    ];

    header('Content-Type: application/json'); // Ensure correct Content-Type header
    echo json_encode($response);
}
?>
