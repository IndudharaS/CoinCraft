<?php
$showError = 'false';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $email = $_POST['loginemail'];
    $pass = $_POST['loginpass'];

    $sql = "Select * from users where email = '$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass,$row['password'])){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['slno']=$row['id'];
            $first_name = $row['first_name'];
            $_SESSION['first_name'] = $first_name;
            $last_name = $row['last_name'];
            $_SESSION['last_name'] = $last_name;
            $_SESSION['useremail']=$email;
            $budget = $row['budget'];
            $_SESSION['budget'] = $budget;
            // header("Location: http://localhost/coincraft/dashboard.php");
            header("Location: /coincraft/dashboard.php");
            exit;
        }
        else{
            $showError = "Passwords do not match";
            header("Location: /coincraft/index.php?loginsuccess=false&error=$showError");
        }
    }
    else{
        $showError = "Invalid crediantials";
        header("Location: /coincraft/index.php?loginsuccess=false&error=$showError");
    }
    // header("Location: /DBMS-mini_project/index.php?signupsuccess=true");
}


?>
