<?php
$showerror = "false";
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {

    include '/xampp/htdocs/forum/dbconnect.php';
    $email = $_POST['loginemail'];
    $password = $_POST['loginpass'];

    $sql = "SELECT * FROM `users` WHERE user_email = '$email'";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    if ($numrows == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['user_password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $email;
            echo "loggedin" . $email;
        }
        header("location: /forum/index.php");
    }
}
