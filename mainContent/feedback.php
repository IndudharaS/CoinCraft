<?php


$uid=$_SESSION['slno'];

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $rate = $_POST["rate"];
        $description = $_POST["description"];
    
      // Sql query to be executed
      $sql = "INSERT INTO `feedback` ( `star`, `comments`, `user_id`, `datestamp`) VALUES ( '$rate', '$description', '$uid', current_timestamp());";
      $result = mysqli_query($conn, $sql);
    
       
      if($result){ 
          echo '<div class="alert alert-success alert-dismissible fade show m-4" role="alert">
          <strong>Success!</strong> Rating added successfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
      else{
          echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
      } 
    }


?>
<div class="container " style="min-height:600px;">
    <div class="container p-3">
        <div class="card">
            <h5 class="card-header">Rating</h5>
            <div class="card-body">
                <h5 class="card-title">Provide Rating to Better You</h5>
                <p class="card-text">With your continious support we are able to reach here.</p>
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
                    <div class="row g-2  mb-3 ">
                        <div class="col-md-6">
                            <div class="form-floating ">
                                <input type="email" class="form-control" id="floatingInputGrid"
                                    placeholder="name@example.com" value="<?php echo $_SESSION['useremail'] ?>"
                                    disabled>
                                <label for="floatingInputGrid">Email address</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select class="form-select" id="rate" aria-label="Floating label select example"
                                    name="rate">
                                    <!-- <option selected>Open this select menu</option> -->
                                    <!-- <option value="5">Very Good</option>
                                    <option value="4">Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Poor</option>
                                    <option value="1">Very Poor</option> -->
                                    <?php
                                            $sql = "SELECT * FROM `_star` ORDER by id desc";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                            }
                                        ?>
                                </select>
                                <label for="rate">Rating</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2  mb-3 ">
                        <div class="col-md-8">
                            <div class="input-group  ">
                                <span class="input-group-text">Enter Description</span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="description" placeholder="Username"
                                        name="description">
                                    <label for="description">Description</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Post</button>
                    <button type="reset" class="btn btn-outline-primary ml-3">Clear</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container px-4">
        <hr>
        <h4>Some Q and A's</h4>
        <div class="container p-4">
            <div class="accordion" id="accordionPanelsStayOpenExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            Is Password is safe with you
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            <strong>YES.</strong> You'r password is secured safely here. Here you password is encrypted using a private key
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo">
                            Is this platform free?
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <strong>Absolutely free.</strong> Just by creating a account, you can  start using our service. No need to pay any subscription fees or advertisements. Yes, it is a free platform. You can use our services without any cost.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container px-4">
    <hr>
    <p class="text-center">&copy; Copyright 2024</p>
</div>