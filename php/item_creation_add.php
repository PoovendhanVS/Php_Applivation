<?php
session_start();

if (isset($_SESSION['username'])) {
    $name = $_SESSION['username'];
} else {
    header('Location: index.php');
    exit;
}

if (isset($_POST['submit'])) {
    $type = $_POST['item_type'];
    $code = $_POST['item_code'];
    $rate = $_POST['item_rate'];
    $description = $_POST['item_desc'];

    // Include the database connection
    include 'connect.php';

    // Prepare the SQL statement with placeholders
    $sql = "INSERT INTO item_creation (Item_Type, Item_Code, Price, Description) VALUES (?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters to the statement
    $stmt->bind_param("ssss", $type, $code, $rate, $description);

    // Execute the query
    $result_is_done = $stmt->execute();

    // Check if the query was successful
    if ($result_is_done) {
        header('location: item_list.php');
    } else {
        // Handle the error
        echo "<script>";
        echo "alert('Error Found!')";
        echo "</script>";
    }
} else {
    // Handle the case where the form was not submitted
    echo "<script>";
    echo "alert('Error Found!')";
    echo "</script>";
}
?>
