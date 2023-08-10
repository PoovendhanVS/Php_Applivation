<!DOCTYPE html>
<html>

<head>
  <title>Sign up from</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
html,body{
  font-family: Roboto, Arial, sans-serif;
  font-size: 15px;
}
#signupForm {
  display: flex;
  justify-content: center;
  border: 5px solid #f1f1f1;
}

input[type=text],
input[type=password],
input[type=email] {
  width: 100%;
  padding: 16px 8px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

.icon {
  font-size: 110px;
  display: flex;
  justify-content: center;
  color: #4286f4;
}

button {
  background-color: #4286f4;
  color: white;
  padding: 14px 0;
  margin: 10px 0;
  border: none;
  cursor: grab;
  width: 48%;
}

h1 {
  text-align: center;
  font-size: 18;
}

button:hover {
  opacity: 0.8;
}

.formcontainer {
  text-align: center;
  margin: 24px 50px 12px;
}

.container {
  padding: 16px 0;
  text-align: left;
}

span.psw {
  float: right;
  padding-top: 0;
  padding-right: 15px;
}

/* Change styles for span on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
    display: block;
    float: none;
  }
}

.signin-link {
  text-align: center;
}
  </style>
</head>

<body>

  <?php
  session_start();

  if (isset($_SESSION['username'])) {
      $name = $_SESSION['username'];
  } else {
      header('Location: index.php');
      exit;
  }

  include 'connect.php'; 
  $uid = $_GET['id'];
  $sql = "SELECT * FROM sign_up WHERE id='" . $uid . "'";
  $result = mysqli_query($conn, $sql);
  $singleRow = mysqli_fetch_assoc($result);
  $name = $singleRow['User_Name'];
  $email = $singleRow['Email_ID'];
  $pwd = $singleRow['Password'];
  ?>
  <?php 
  include 'html/nav-bar.html'; ?>

<form id="signupForm" action="<?php echo 'change_user.php?id=' . $singleRow['id']; ?>" method="POST" onsubmit="validateForm(event)" autocomplete="off">

    <div class="formcontainer">
      <div class="container">
  <center>
      <h1 class="heading" style="color: #4286f4;">UPDATE SIGN UP</h1>
    </center>
        <label for="uname"><strong>Username</strong></label>
        <input type="text" placeholder="Enter Username" name="uname" id="user_name" value="<?php echo $name ?>">
        <label for="mail"><strong>E-mail</strong></label>
        <input type="email" placeholder="Enter E-mail" name="mail" id="user_email" value="<?php echo $email ?>">
        <label for="psw"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="psw" id="user_pwd" value="<?php echo $pwd ?>">
      </div>
      <button type="submit" name="submit"><strong>UPDATE</strong></button>
    </div>
  </form>

  
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
</body>

  /*
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

*/
</script>

</html>