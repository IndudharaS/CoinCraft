<?php
$uid=$_SESSION['slno'];


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $budget = $_POST["budget"];
    
      // Sql query to be executed
        $sql = "UPDATE users SET first_name = '$fname', last_name = '$lname' , email = '$email' , budget = '$budget'  WHERE users.id = $uid;";
        $result = mysqli_query($conn, $sql);
        
        
        if($result){ 
            echo '<div class="alert alert-success alert-dismissible fade show m-4" role="alert">
            <strong>Success!</strong> Updated successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        else{
            echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
        } 
    }
    

?>
<div class="container p-3 ">
    <div class="card w-75 mx-auto my-5">
        <div class="card-body">
            <h2 class="card-title text-center pt-3">Hey User!..</h2>
            <p class="card-title text-center pb-3" >Free fell to Update</p>
            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="POST"
                action="<?php echo $_SERVER['REQUEST_URI'] ?>">

                <div class="row g-2  mb-3 ">
                    <div class="col-md-10 mx-auto">
                        <div class="input-group " >
                            <span class="input-group-text">First Name</span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="amount" placeholder="Username"
                                    name="fname" value="<?php
                                            $sql = "SELECT * FROM `users` where id = $uid";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo $row['first_name'];
                                            }
                                        ?>">
                                <label for="amount">First name</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-2  mb-3 ">
                    <div class="col-md-10 mx-auto">
                        <div class="input-group  ">
                            <span class="input-group-text">Last Name</span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="amount" placeholder="Username"
                                    name="lname" value="<?php
                                            $sql = "SELECT * FROM `users` where id = $uid";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo $row['last_name'];
                                            }
                                        ?>">
                                <label for="amount">Last Name</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-2  mb-3 ">
                    <div class="col-md-10 mx-auto">
                        <div class="input-group  ">
                            <span class="input-group-text">E-Mail</span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="amount" placeholder="Username"
                                    name="email" value="<?php
                                            $sql = "SELECT * FROM `users` where id = $uid";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo $row['email'];
                                            }
                                        ?>">
                                <label for="amount">E-Mail</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-2  mb-3 ">
                    <div class="col-md-10 mx-auto">
                        <div class="input-group  ">
                            <span class="input-group-text">Monthly Budget</span>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="amount" placeholder="Username"
                                    name="budget" value="<?php
                                            $sql = "SELECT * FROM `users` where id = $uid";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo $row['budget'];
                                            }
                                        ?>"> 
                                <label for="amount">Budget</label>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
  <div class="col">
  <button class="w-100 btn btn-lg btn-primary mx-auto" type="submit">Update</button>
  </div>
  <div class="col">
    <a href="delete.php" class="w-100 btn-lg btn btn-outline-primary mx-auto">Delete Account</a>
  </div>
</div>

                


            </form>
        </div>
    </div>
</div>