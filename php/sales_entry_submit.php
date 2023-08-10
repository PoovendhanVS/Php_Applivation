<?php 
if (isset($_POST['name_id'], $_POST['invoice'], $_POST['bill_date'])) {
    $customer_id = $_POST['name_id'];
    $invoice_number = $_POST['invoice'];
    $bill_date = $_POST['bill_date'];
    $total = 'NONE';

    include 'connect.php';
    $sql = "INSERT INTO invoice_details (CUSTOMER_ID, INVOICE_ID, BILL_DATE, TOTAL) VALUES ('$customer_id','$invoice_number','$bill_date','$total')";
    $result = $conn->query($sql);

    if ($result) {
        $response = [
            'status' => 'Success',
            'message' => 'Invoice id created successfully!'
        ];
    } else {
        $response = [
            'status' => 'Error',
            'message' => 'Invoice id not created!'
        ];
    }

    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
