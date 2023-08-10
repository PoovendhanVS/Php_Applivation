<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP - Sign Up page</title>
  <link rel="stylesheet" href="css/login_style.css">
</head>

<style>
</style>

<body>
  <div class="container">
    <div class="card">
      <h2>Login Form</h2>
      <form id="loginForm" action="" method="POST" autocomplete="false">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter your username">
        <span id="user_error" style="display:none;color:red;font-size:14px;"></span>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password">
        <span id="password_error" style="display:none;color:red;font-size:14px;"></span>
        <button type="submit" onsubmit="validate(event)" name="login">Login</button>
        <!-- <p class="signin-link" style="display: block; text-align:center;"><span>Creat new account? </span><a href="sign_up.php">Sign Up</a></p> -->
      </form>
    </div>
  </div>
  <!-- PHP Scripting tag -->
  
  
  
  <!-- PHP Scripting end-tag -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('#loginForm').submit(function(event) {
    event.preventDefault();
    var user_name = $('#username').val();
    var password = $('#password').val();
    var u_err = document.getElementById('user_error'); 
    var p_err = document.getElementById('password_error'); 
    
    if (user_name === '') {
      $('#username').css('border', '2px solid red');
      u_err.style.display = 'block';
      u_err.innerHTML = 'User name is required';
    } else if (password === '') {
      $('#password').css('border', '2px solid red');
      p_err.style.display = 'block';
      p_err.innerHTML = 'Password is required';
    } else {
      $('#username').css('border', '');
      u_err.style.display = 'none';
      $('#password').css('border', ''); 
      p_err.style.display = 'none';
      
      $.ajax({
        url: 'login_validation.php',
        type: 'POST',
        data: {
          'username': user_name,
          'password': password
        },
        dataType: 'json',
        success: function(response) {
          if (response.success) {
            alert(response.success);
            window.location.href = 'home.php'; 
          } else if (response.error) {
          $('#username').css('border', '2px solid red');
          u_err.style.display = 'block';
          u_err.innerHTML = 'User name is incorrect';

          $('#password').css('border', '2px solid red');
          p_err.style.display = 'block';
          p_err.innerHTML = 'Password is incorrect';
          } else {
            alert('An error occurred');
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
          alert('Error: ' + error);
        }
      });
    }
  });
});
</script>

</body>

</html>
