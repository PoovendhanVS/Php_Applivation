<?php 
include 'connect.php';
if (isset($_GET['selectedId'])) {
    $id = $_GET['selectedId'];
    $sql = "SELECT * FROM customer_creation WHERE id = '". $id ."'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $response = [
        'company_name' => $row['Company_Name'],
        'gst' =>  $row['GST'], 
        'building_number' =>  $row['Building_Number'], 
        'street' =>  $row['Street'], 
        'area' =>  $row['Area'], 
        'city' =>  $row['City'], 
        'state' =>  $row['State'], 
        'country' =>  $row['Country'],
        'pincode' =>  $row['Pincode'],
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
