<?php
session_start();

if (isset($_SESSION['username'])) {
    $name = $_SESSION['username'];
} else {
    header('Location: index.php');
    exit;
}
include 'connect.php';
if (isset($_GET['id'])) {
    $del = $_GET['id'];
    $sql = "DELETE FROM sign_up WHERE id = '$del' ";
    $del_result = mysqli_query($conn, $sql);
    if ($del_result) {
        header('location: users_list.php');
    }else {
        echo "<script rel='jsavascript'>";
        echo "alert('No one is deleted something error is found!')";
        echo "</script>";
    }
} else {
    echo "Condition is failed!";
}
?>
