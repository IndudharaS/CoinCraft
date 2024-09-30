<?php

// session_start();

echo'<div class="b-example-divider"></div>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none fs-4 fw-semibold">CoinCraft</a>
      </div>

      <ul class="nav nav-pills fs-6 fw-medium">
        <li class="nav-item"><a href="#home" class="nav-link" aria-current="page">Home</a></li>
        <li class="nav-item"><a href="#features" class="nav-link">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link">About</a></li>
      </ul>';

      if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true ){
        echo '<h6 class="p-2 ml-5" style="width:250px;">Welcome '.$_SESSION['name'].'</h6>
        <a role="button" href="partials/_logout.php" class="btn btn-primary ">Logout</a>';
      }
      else{
        echo '<div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal" data-bs-target="#loginmodal">Sign in</button>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#signupmodal">Get Started</button>
      </div>';
      }
      echo'
    </header>
  </div>

  <div class="b-example-divider"></div>


</div>';

include "partials/_loginmodal.php";
include "partials/_signupmodal.php";



if(isset($_GET['signupsuccess'])&&$_GET['signupsuccess']=='true'){
    
    echo '<div class="alert alert-success m-3 alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You can login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

  if(isset($_GET['signupsuccess'])&&$_GET['signupsuccess']=='false'&& isset($_GET['error'])){
    echo '<div class="alert alert-danger m-3 alert-dismissible fade show" role="alert">
    <strong>Failure!</strong>'.$_GET['error'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }

  if(isset($_GET['loginsuccess'])&&$_GET['loginsuccess']=='false'&& isset($_GET['error'])){
    echo '<div class="alert alert-danger m-3 alert-dismissible fade show" role="alert">
    <strong>Failure!</strong>'.$_GET['error'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  

?>


<!-- <li class="nav-item"><a href="#" class="nav-link">Pricing</a></li> -->
        <!-- <li class="nav-item"><a href="#" class="nav-link">FAQs</a></li> -->