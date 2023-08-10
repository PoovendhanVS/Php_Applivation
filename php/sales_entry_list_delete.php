<?php
include 'connect.php';

if (isset($_POST['ids'])) {
    $id = $_POST['ids'];

    // Use prepared statements to prevent SQL injection
    $sql = "DELETE FROM invoice_details WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id); // Assuming 'id' is an integer
    $result = $stmt->execute();

    if ($result) {
        $response = ['success' => true];
    } else {
        $response = ['success' => false];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = ['error' => 'Invalid request method'];
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
