<?php
$adminshowError = 'false';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    // $adminname = $_POST['adminname'];
    $adminpass = $_POST['adminpass'];

    $sql = "Select * from admin where adminname = 'Admin'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($adminpass,$row['password'])){
            session_start();
            $_SESSION['adminLoggedin']=true;
            $_SESSION['adminSlno']=$row['id'];
            $adminname = $row['adminname'];
            $_SESSION['adminname'] = $adminname;
            // $last_name = $row['last_name'];
            // $_SESSION['last_name'] = $last_name;
            // $_SESSION['useremail']=$email;
            // header("Location: http://localhost/coincraft/dashboard.php");
            header("Location: /coincraft/adminContent/dashboard.php");
            exit;
        }
        else{
            $adminshowError = "Passwords do not match";
            header("Location: /coincraft/partials/_admin.php?adminloginsuccess=false&adminerror=$adminshowError");
        }
    }
    // else{
    //     $showError = "Invalid crediantials";
    //     header("Location: /coincraft/index.php?loginsuccess=false&error=$showError");
    // }
    // header("Location: /DBMS-mini_project/index.php?signupsuccess=true");
}


?>
