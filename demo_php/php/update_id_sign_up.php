<?php 
include 'connect.php'; 
if(isset($_POST['submit'])){
    
    echo "<script rel='jsavascript'>";
    echo "alert('Upadted')";
    echo "</script>";
// $uid = $_GET['id'];
// $name = $_POST['uname'];
// $email = $_POST['mail'];
// $pwd = $_POST['psw'];
// $sql = "UPDATE sign_up SET User_Name = '$name', Email_ID = '$email', Password = '$pwd' WHERE id = '$uid' ";
// $result = mysqli_query($conn, $sql);
// if ($result==true){
//     echo "<script rel='jsavascript'>";
//     echo "alert('Upadted')";
//     echo "</script>";
// }
// else{
//     echo "<script rel='jsavascript'>";
//     echo "alert('Failed')";
//     echo "</script>";
// }
}
else{
    header('location: update_user_id.php');
}
?>