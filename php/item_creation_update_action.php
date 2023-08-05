<?php 
include 'connect.php';

if (isset($_POST['submit'])){
    $get_id = $_GET['id'];
    $item_type = $_POST['item_type'];
    $item_code = $_POST['item_code'];
    $item_rate = $_POST['item_rate'];
    $description = $_POST['item_desc'];

    $sql = "UPDATE item_creation SET 
    Item_Type = '$item_type',
    Item_Code = '$item_code', 
    Price = '$item_rate', 
    `Description` = '$description'
    WHERE id = '$get_id'";
    $result_is_update = $conn->query($sql);
    if ($result_is_update) {
        
        echo "<script rel='jsavascript'>";
        echo "alert('Item updated successfully!' )";
        echo "</script>";
        header('location: item_list.php');

    } else {
        echo "<script rel='jsavascript'>";
        echo "alert('Item can not updated!' )";
        echo "</script>";
    }
    
}


?>