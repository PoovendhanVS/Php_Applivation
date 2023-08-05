<?php

include 'connect.php';
if (isset($_GET['id'])) {
    $del = $_GET['id'];
    $sql = "DELETE FROM item_creation WHERE id = '$del' ";
    $del_result = mysqli_query($conn, $sql);
    if ($del_result) {
        header('location: item_list.php');
    }else {
        echo "<script rel='jsavascript'>";
        echo "alert('No one is deleted something error is found!')";
        echo "</script>";
    }
} else {
    echo "Condition is failed!";
}
?>
