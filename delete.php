<?php
 include 'partials/_dbconnect.php';
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}

    $uid=$_SESSION['slno'];
    $sql = "DELETE FROM users WHERE id = $uid";
    $result = mysqli_query($conn, $sql);
    header("Location: /coincraft/");

?>
