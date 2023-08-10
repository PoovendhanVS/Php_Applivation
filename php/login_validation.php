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
                $_SESSION['username'] = $row['User_Name'];
                $_SESSION['password'] = $row['Password'];
                $_SESSION['id'] = $row['id'];

                // Redirect to home.php
                // header("Location: home.php");
                $response = [
                    'success' => 'You are successfully logged in',
                ];
            
                header('Content-Type: application/json'); // Ensure correct Content-Type header
                echo json_encode($response);
                
                exit();
            } else {
                $response = [
                    'error' => 'The user name or password are incorrect',
                ];
            
                header('Content-Type: application/json'); // Ensure correct Content-Type header
                echo json_encode($response);
            }
        } else {
            $response = [
                'error' => 'The user name or password are incorrect',
            ];
        
            header('Content-Type: application/json'); // Ensure correct Content-Type header
            echo json_encode($response);
        }
    }
}
?>
