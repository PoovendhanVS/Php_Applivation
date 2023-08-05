<?php 
include 'connect.php'; 
if(isset($_POST['submit'])){
    $uid = $_GET['id'];
    $name = $_POST['uname'];
    $email = $_POST['mail'];
    $pwd = $_POST['psw'];
    $sql = "UPDATE sign_up SET User_Name = '$name', Email_ID = '$email', Password = '$pwd' WHERE id = '$uid' ";
    $result_change = mysqli_query($conn, $sql);
    if ($result_change==true){
        echo "<script rel='jsavascript'>";
        echo "alert('Details updated successfully')";
        echo "</script>";
        header('location: users_list.php');
    }
    else{
        echo "<script rel='jsavascript'>";
        echo "alert('Something error!')";
        echo "</script>";
        header('location: update_user_id.php');
    }
}