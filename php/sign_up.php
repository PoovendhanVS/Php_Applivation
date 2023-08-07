<!DOCTYPE html>
<html>
<title>Sign up from</title>

<head>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
  <link rel="stylesheet" href="css/sign_up_style.css">
  <style>
  </style>
</head>

<body>
  <form id="signupForm" action="" method="POST"  onsubmit="validateForm(event)" autocomplete="off">
    <div class="formcontainer">
      <div class="container">
        <label for="uname"><strong>Username</strong></label>
        <input type="text" placeholder="Enter Username" name="uname" id="user_name" value="">
        <label for="mail"><strong>E-mail</strong></label>
        <input type="email" placeholder="Enter E-mail" name="mail" id="user_email" value="">
        <label for="psw"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="psw" id="user_pwd" value="">
      </div>
      <button type="submit" name="signup"><strong>SIGN UP</strong></button>
    </div>
    <p class="signin-link" style="display: block;"><span>Already have an account? </span><a href="index.php">Sign In</a></p>
  </form>

  <?php

include "connect.php";


if (isset($_POST['signup'])) {

    $name = $_POST['uname'];
    $email = $_POST['mail'];
    $pwd = $_POST['psw'];


    // SQL query with corrected syntax and using placeholders to prevent SQL injection
    $sql = "INSERT INTO sign_up (User_Name, Email_ID, Password) VALUES ('$name', '$email', '$pwd')";

    if ($conn->query($sql) === TRUE) {
        header('location: index.php');
       
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


</body>
<script>
    
  function validateForm(event) {
   var name = document.getElementById("user_name").value;
   var email = document.getElementById("user_email").value;
   var password = document.getElementById("user_pwd").value;
   if (name === "") {
           alert("User Name is required");
           event.preventDefault(); 
           return false;
           }
   if (email === "") {
           alert("Email ID is required");
           event.preventDefault(); 
           return false;
           }
   
    else {
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if ((emailPattern.test(email)) !=  true){
            alert('Check Email');
            event.preventDefault(); 
            return false;
        }
    }
    if (password === "") {
      alert("Password is required");
      event.preventDefault(); 
      return false;
      }
    else{
      alert('Your account created successfully');
    }
  }


</script>
</html>