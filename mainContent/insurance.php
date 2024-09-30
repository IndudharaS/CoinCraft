<div class="container " style="min-height:600px;">
    <?php
    $uid=$_SESSION['slno'];
?>

    <?php

if(isset($_GET['deleteI'])){
    $snolI = $_GET['deleteI'];
    $delete = true;
    $sql = "DELETE FROM `insurance` WHERE `id` = $snolI";
    $result = mysqli_query($conn, $sql);
  }


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['snoEditI'])){// Update the record
        $snoI = $_POST["snoEditI"];
        $policyIEdit = $_POST["policyIEdit"];
        $coverageIEdit = $_POST["coverageIEdit"];
        $premiumIEdit = $_POST["premiumIEdit"];
        $startdateIEdit = $_POST["startdateIEdit"];
        $enddateIEdit = $_POST["enddateIEdit"];
        $insuranceIEdit = $_POST["insuranceIEdit"];
        $frequencyIEdit = $_POST["frequencyIEdit"]; 
    
      // Sql query to be executed
      $sql = "UPDATE `insurance` SET `policy_no` = '$policyIEdit',`coverage` = '$coverageIEdit', `premium` = '$premiumIEdit', `start_date` = '$startdateIEdit', `end_date` = '$enddateIEdit', `user_id` = '$uid', `insurance_id` = '$insuranceIEdit', `frequency_id` = '$frequencyIEdit' WHERE `insurance`.`id` = '$snoI'";
      $result = mysqli_query($conn, $sql);
      if($result){
        echo '<div class="alert alert-success alert-dismissible fade show m-4" role="alert">
          <strong>Success!</strong> Expense Updated successfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else{
        echo "We could not update the record successfully";
    }
    }
    else{
        $policyI = $_POST["policyI"];
        $coverageI = $_POST["coverageI"];
        $premiumI = $_POST["premiumI"];
        $startdateI = $_POST["startdateI"];
        $enddateI = $_POST["enddateI"];
        $insuranceI = $_POST["insuranceI"];
        $frequencyI = $_POST["frequencyI"];
    
      // Sql query to be executed
      $sql = "INSERT INTO `insurance` ( `policy_no`, `coverage`, `premium`, `start_date`, `end_date`, `user_id`, `insurance_id`, `frequency_id`, `datestamp`) VALUES ( '$policyI', '$coverageI', '$premiumI', '$startdateI', '$enddateI', '$uid', '$insuranceI', '$frequencyI', current_timestamp());";
      $result = mysqli_query($conn, $sql);
    
       
      if($result){ 
          echo '<div class="alert alert-success alert-dismissible fade show m-4" role="alert">
          <strong>Success!</strong> Expense added successfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
      else{
          echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
      } 
    }
    }

?>

    <!--Edit Modal -->
    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Insurance</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
                <input type="hidden" name="snoEditI" id="snoEditI"> 
                        <div class="row g-2  mb-3 mt-3 ">
                            <div class="col-md-5">
                                <div class="form-floating ">
                                    <input type="email" class="form-control" id="floatingInputGrid"
                                        placeholder="name@example.com" value="<?php echo $_SESSION['useremail'] ?>"
                                        disabled>
                                    <label for="floatingInputGrid">Email address</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2  mb-3 ">
                            <div class="col-md-4">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Policy No</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="policyIEdit" placeholder="Username"
                                            name="policyIEdit">
                                        <label for="policyIEdit">Policy Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Coverage</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="coverageIEdit" placeholder="Username"
                                            name="coverageIEdit">
                                        <label for="coverageIEdit">Coverage</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Premium</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="premiumIEdit" placeholder="Username"
                                            name="premiumIEdit">
                                        <label for="premiumIEdit">Premium</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2  mb-3 ">
                            <div class="col-md-6">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Start Date</span>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="startdateIEdit" placeholder="Username"
                                            name="startdateIEdit">
                                        <label for="startdateIEdit">Start Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="input-group  ">
                                    <span class="input-group-text">Enter End Date</span>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="enddateIEdit" placeholder="Username"
                                            name="enddateIEdit">
                                        <label for="enddateIEdit">End Date</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2  mb-3 "> 
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="insuranceIEdit" aria-label="Floating label select example"
                                        name="insuranceIEdit">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <!-- <option value="1">Life Insurance</option>
                                        <option value="2">Health Insurance</option>
                                        <option value="3">Home Insurance</option>
                                        <option value="4">Travel Insurance</option> -->
                                        <?php
                                            $sql = "SELECT * FROM `_insurance`";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    <label for="insuranceIEdit">Select Insurance Type</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="frequencyIEdit" aria-label="Floating label select example"
                                        name="frequencyIEdit">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <!-- <option value="1">Monthly</option>
                                        <option value="2">Weekly</option>
                                        <option value="3">Quaterly</option>
                                        <option value="4">Annually</option> -->
                                        <?php
                                            $sql = "SELECT * FROM `_frequency`";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    <label for="frequencyIEdit">Select Payment Frequency</label>
                                </div>
                            </div>
                        </div>
                        <!-- <button type="reset" class="btn btn-outline-primary ml-3">Clear</button> -->
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Insurance</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container my-3">
        <p class="d-inline-flex gap-1">
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#add"
                aria-expanded="false" aria-controls="collapseExample">
                Want to add Insurance? click me,
            </button>
        </p>
        <div class="collapse" id="add">
            <div class="card card-body">
                <div class="container px-5 pt-3  ">
                    <h2>Add Insurance</h2>
                    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
                        <div class="row g-2  mb-3 mt-3 ">
                            <div class="col-md-5">
                                <div class="form-floating ">
                                    <input type="email" class="form-control" id="floatingInputGrid"
                                        placeholder="name@example.com" value="<?php echo $_SESSION['useremail'] ?>"
                                        disabled>
                                    <label for="floatingInputGrid">Email address</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2  mb-3 ">
                            <div class="col-md-4">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Policy No</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="policyI" placeholder="Username"
                                            name="policyI">
                                        <label for="policyI">Policy Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Coverage</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="coverageI" placeholder="Username"
                                            name="coverageI">
                                        <label for="coverageI">Coverage</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Premium</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="premiumI" placeholder="Username"
                                            name="premiumI">
                                        <label for="premiumI">Premium</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2  mb-3 ">
                            <div class="col-md-6">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Start Date</span>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="startdateI" placeholder="Username"
                                            name="startdateI">
                                        <label for="startdateI">Start Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="input-group  ">
                                    <span class="input-group-text">Enter End Date</span>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="enddateI" placeholder="Username"
                                            name="enddateI">
                                        <label for="enddateI">End Date</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2  mb-3 "> 
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="insuranceI" aria-label="Floating label select example"
                                        name="insuranceI">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <!-- <option value="1">Life Insurance</option>
                                        <option value="2">Health Insurance</option>
                                        <option value="3">Home Insurance</option>
                                        <option value="4">Travel Insurance</option> -->
                                        <?php
                                            $sql = "SELECT * FROM `_insurance`";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    <label for="insuranceI">Select Insurance Type</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="frequencyI" aria-label="Floating label select example"
                                        name="frequencyI">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <!-- <option value="1">Monthly</option>
                                        <option value="2">Weekly</option>
                                        <option value="3">Quaterly</option>
                                        <option value="4">Annually</option> -->
                                        <?php
                                            $sql = "SELECT * FROM `_frequency`";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    <label for="frequencyI">Select Payment Frequency</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Insurance</button>
                        <button type="reset" class="btn btn-outline-primary ml-3">Clear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <div class="container my-3 px-3 mt-4">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>SLNO</th>
                    <th>Policy No</th>
                    <th>Coverage</th>
                    <th>Premium</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Insurance Type</th>
                    <th>Renewal Frequency</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
          $sql = "SELECT i.*, u.first_name AS user_name, ins.name AS insurance_name, freq.name AS frequency_name FROM insurance i JOIN users u ON i.user_id = u.id JOIN _insurance ins ON i.insurance_id = ins.id JOIN _frequency freq ON i.frequency_id = freq.id WHERE i.user_id = '$uid'
                        ORDER BY id DESC";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['policy_no'] . "</td>
            <td>". $row['coverage'] . "</td>
            <td>". $row['premium'] . "</td>
            <td>". $row['start_date'] . "</td>
            <td>". $row['end_date'] . "</td>
            <td>". $row['insurance_name'] . "</td>
            <td>". $row['frequency_name'] . "</td>
            <td><button type='button' class='btn btn-primary btn-sm edit' data-bs-toggle='modal' data-bs-target='#edit' id=".$row['id'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['id'].">Delete</button>  </td>
            </tr>";
        } 
          ?>
            </tbody>
        </table>
    </div>


    <div class="card text-center m-3">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <div class="row g-2  mb-3 ">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sorted according to Insurance Type</h5>
                            <!-- <p class="card-text">Some taste's of your choice.</p> -->
                            <p class="d-inline-flex gap-1">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#category" aria-expanded="false" aria-controls="collapseExample">
                                    Show/Hide
                                </button>
                            </p>
                            <div class="collapse" id="category">
                                <?php
                            $sql = "SELECT ins.name AS insurance_name, SUM(i.premium) AS total_amount, COUNT(i.id) AS insurance_count FROM insurance i JOIN _insurance ins ON i.insurance_id = ins.id WHERE i.user_id = '$uid' GROUP BY i.insurance_id;";
                            $result = mysqli_query($conn, $sql);
                            $sno = 0;
                            $r=true;
                            while($row = mysqli_fetch_assoc($result)){
                                $r=false;
                                $sno = $sno + 1;
                                echo '<div class="card card-body m-3">
                                '.$row['insurance_name'].' : Rs.'.$row['total_amount'].' spent
                                <div>Count : '.$row['insurance_count'].' </div>
                                </div>';
                            } 
                            if($r){
                                echo "<div class='card card-body alert alert-warning'>No Insurance Found! Try to Add Some Insurance.</div>" ;
                            }
                        ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sorted according to Payment Frequency</h5>
                            <!-- <p class="card-text">Be familar with all payment methods.</p> -->
                            <p class="d-inline-flex gap-1">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    Show/Hide
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <?php
                            $sql = "SELECT freq.name AS frequency_name, SUM(i.premium) AS total_amount, COUNT(i.id) AS frequency_count FROM insurance i JOIN _frequency freq ON i.frequency_id = freq.id WHERE i.user_id = '$uid' GROUP BY i.frequency_id;";
                            $result = mysqli_query($conn, $sql);
                            $sno = 0;
                            $r=true;
                            while($row = mysqli_fetch_assoc($result)){
                                $r=false;
                                $sno = $sno + 1;
                                echo '<div class="card card-body m-3">
                                '.$row['frequency_name'].' : Rs.'.$row['total_amount'].' spent
                                <div> Frequency : '.$row['frequency_count'].' </div>
                                </div>';
                            } 
                            if($r){
                                echo "<div class='card card-body alert alert-warning'>No Insurance Found! Try to Add Some Insurance.</div>" ;
                            }
                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-body-secondary">
            Updated few seconds ago
        </div>
    </div>
</div>
<div class="container px-4">
<hr>
    <p class="text-center">&copy; Copyright 2024</p>
</div>