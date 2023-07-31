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
      <form action="" method="POST" autocomplete="false">
        <?php if (isset($_GET['error'])) { ?>

          <p class="error">
            <?php echo $_GET['error']; ?>
          </p>

        <?php } ?>
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter your username">

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password">

        <button type="submit" name="login">Login</button>
        <p class="signin-link" style="display: block; text-align:center;"><span>Creat new account? </span><a href="sign_up.php">Sign Up</a></p>
      </form>
    </div>
  </div>
  <!-- PHP Scripting tag -->
  
  <?php
  session_start();
  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    include "connect.php";

    if (isset($_POST['username']) && isset($_POST['password'])) {


      $uname = $_POST['username'];
      $pass = $_POST['password'];

     
        $sql = "SELECT * FROM sign_up WHERE User_Name='$uname' AND Password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['User_Name'] === $uname && $row['Password'] === $pass) {

                // echo "Logged in!";

                $_SESSION['username'] = $row['User_Name'];
                $_SESSION['password'] = $row['Password'];
                $_SESSION['id'] = $row['id'];
                // echo $_SESSION['username'];

                header("Location: home.php");

                exit();

            }else{
                echo 'log error';
                // header("Location: sign_in.php?error=Incorect User name or password");

                exit();

            }

        }else{
          echo 'User name error';

            // header("Location: sign_in.php?error=Incorect User name or password");

            exit();

        }

    }
  }

  ?>
  <!-- PHP Scripting end-tag -->
</body>

</html>


<script>
  
function callPHPFunction(1) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById("result").innerHTML = xhr.responseText;
                    } else {
                        console.error('Error:', xhr.status);
                    }
                }
            };
            xhr.open('GET', 'your_php_file.php?button=' + button, true);
            xhr.send();
        }
  </script>