<?php
$showerror = "false";
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {

    include '/xampp/htdocs/forum/dbconnect.php';
    $user_email = $_POST['signupemail'];
    $password = $_POST['signuppassword'];
    $cpassword = $_POST['signupcpassword'];

    //Check whether email exist or not
    $exist_sql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $exist_sql);
    $numrows = mysqli_num_rows($result);
    if ($numrows > 0) {
        $showerror = "Username alreay exist!";
        //     echo '<div class="alert alert-alert alert-dismissible fade show" role="alert">
        //     <strong>Error</strong> Username alreay exist!
        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //   </div>';
    } else {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_password`, `user_time`) VALUES ('$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            // echo $result;
            if ($result) {
                $showalert = true;
                header("Location: /forum/index.php?signupsuccess=true");
                exit();
            }
        } else {
            $showerror = "Password do not match!";
            //         echo '<div class="alert alert-alert alert-dismissible fade show" role="alert">
            //     <strong>Error</strong> Password do not match!
            //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            //   </div>';
        }
    }
    header("Location: /forum/index.php?signupsuccess=false&error=$showerror");
}