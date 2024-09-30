<?php
$showError = 'false';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';

    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['signupemail'];
    $pass = $_POST['signuppassword'];
    $cpass = $_POST['signupcpassword'];


    $existSql = "Select * from users where email = '$email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email already in use";
    }
    else{
        if ($pass == $cpass) {
            //Hash the password before storing it in database
            $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "insert into users (first_name, last_name, email, password) values ('$fname', '$lname', '$email', '$hashedPass')";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: /coincraft/index.php?signupsuccess=true");
                exit;
            }
        }
        else{
            $showError="Password does not match!";
        }
    }   
    header("Location: /coincraft/index.php?signupsuccess=false&error=$showError");                     
}



?>