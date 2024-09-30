<div class="container " style="min-height:600px;">
    <?php
    $uid=$_SESSION['slno'];
?>

    <?php

if(isset($_GET['deleteL'])){
    $snolL = $_GET['deleteL'];
    $delete = true;
    $sql = "DELETE FROM `loans` WHERE `id` = $snolL";
    $result = mysqli_query($conn, $sql);
  }


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['snoEditL'])){// Update the record
        $snoL = $_POST["snoEditL"];
        $amountLEdit = $_POST["amountLEdit"];
        $descriptionLEdit = $_POST["descriptionLEdit"];
        $startdateLEdit = $_POST["startdateLEdit"];
        $enddateLEdit = $_POST["enddateLEdit"];
        $intrestLEdit = $_POST["intrestLEdit"];
        $loantypeLEdit = $_POST["loantypeLEdit"];
        $frequencyLEdit = $_POST["frequencyLEdit"]; 
    
      // Sql query to be executed
      $sql = "UPDATE `loans` SET `amount` = '$amountLEdit', `description` = '$descriptionLEdit', `start_date` = '$startdateLEdit',`end_date` = '$enddateLEdit', `intrest` = '$intrestLEdit', `user_id` = '$uid', `loans_id` = '$loantypeLEdit', `frequency_id` = '$frequencyLEdit' WHERE `loans`.`id` = '$snoL'";
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
        $amountL = $_POST["amountL"];
        $descriptionL = $_POST["descriptionL"];
        $startdateL = $_POST["startdateL"];
        $enddateL = $_POST["enddateL"];
        $intrestL = $_POST["intrestL"];
        $loantypeL = $_POST["loantypeL"];
        $frequencyL = $_POST["frequencyL"];
    
      // Sql query to be executed
      $sql = "INSERT INTO `loans` ( `amount`, `description`, `start_date`, `end_date`, `intrest`, `user_id`, `loans_id`, `frequency_id`, `datestamp`) VALUES ( '$amountL', '$descriptionL', '$startdateL', '$enddateL', '$intrestL', '$uid', '$loantypeL', '$frequencyL', current_timestamp());";
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Loan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
                <input type="hidden" name="snoEditL" id="snoEditL">
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
                            <div class="col-md-6">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Amount</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="amountLEdit" placeholder="Username" 
                                            name="amountLEdit">
                                        <label for="amountLEdit">Amount</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Description</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="descriptionLEdit" placeholder="Username"
                                            name="descriptionLEdit">
                                        <label for="descriptionLEdit">Description</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2  mb-3 ">
                            <div class="col-md-4">
                                <div class="input-group  ">
                                    <span class="input-group-text">Start Date</span>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="startdateLEdit" placeholder="Username"
                                            name="startdateLEdit">
                                        <label for="startdateLEdit">Start Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="input-group  ">
                                    <span class="input-group-text">End Date</span>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="enddateLEdit" placeholder="Username"
                                            name="enddateLEdit">
                                        <label for="enddateLEdit">End Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Intrest</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="intrestLEdit" placeholder="Username"
                                            name="intrestLEdit">
                                        <label for="intrestLEdit">Intrest</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2  mb-3 "> 
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="loantypeLEdit" aria-label="Floating label select example"
                                        name="loantypeLEdit">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <!-- <option value="1">Mortgage Loan</option>
                                        <option value="2">Personal Loan</option>
                                        <option value="3">Student Loan</option>
                                        <option value="4">Business Loan</option> -->
                                        <?php
                                            $sql = "SELECT * FROM `_loans`";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    <label for="loantypeLEdit">Select Loan Type</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="frequencyLEdit" aria-label="Floating label select example"
                                        name="frequencyLEdit">
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
                                    <label for="frequencyLEdit">Select Payment Frequency</label>
                                </div>
                            </div>
                        </div>
                        <!-- <button type="reset" class="btn btn-outline-primary ml-3">Clear</button> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit Loan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="container my-3">
        <p class="d-inline-flex gap-1">
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#add"
                aria-expanded="false" aria-controls="collapseExample">
                Want to add Loan? click me,
            </button>
        </p>
        <div class="collapse" id="add">
            <div class="card card-body">
                <div class="container px-5 pt-3  ">
                    <h2>Add Loan</h2>
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
                            <div class="col-md-6">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Amount</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="amountL" placeholder="Username"
                                            name="amountL">
                                        <label for="amountL">Amount</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Description</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="descriptionL" placeholder="Username"
                                            name="descriptionL">
                                        <label for="descriptionL">Description</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2  mb-3 ">
                            <div class="col-md-4">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Start Date</span>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="startdateL" placeholder="Username"
                                            name="startdateL">
                                        <label for="startdateL">Start Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="input-group  ">
                                    <span class="input-group-text">Enter End Date</span>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="enddateL" placeholder="Username"
                                            name="enddateL">
                                        <label for="enddateL">End Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Intrest</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="intrestL" placeholder="Username"
                                            name="intrestL">
                                        <label for="intrestL">Intrest</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2  mb-3 "> 
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="loantypeL" aria-label="Floating label select example"
                                        name="loantypeL">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <!-- <option value="1">Mortgage Loan</option>
                                        <option value="2">Personal Loan</option>
                                        <option value="3">Student Loan</option>
                                        <option value="4">Business Loan</option> -->
                                        <?php
                                            $sql = "SELECT * FROM `_loans`";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    <label for="loantypeL">Select Loan Type</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select class="form-select" id="frequencyL" aria-label="Floating label select example"
                                        name="frequencyL">
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
                                    <label for="frequencyL">Select Payment Frequency</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Loan</button>
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
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Interst</th>
                    <th>Loan Type</th>
                    <th>Payment Frequency</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
          $sql = "SELECT 
                        l.*, 
                        u.first_name AS user_name, 
                        loan.name AS loan_name, 
                        freq.name AS frequency_name
                    FROM 
                        loans l
                    JOIN 
                        users u ON l.user_id = u.id
                    JOIN 
                        _loans loan ON l.loans_id = loan.id
                    JOIN 
                        _frequency freq ON l.frequency_id = freq.id
                    WHERE 
                        l.user_id = '$uid'
                        ORDER BY id DESC";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['amount'] . "</td>
            <td>". $row['description'] . "</td>
            <td>". $row['start_date'] . "</td>
            <td>". $row['end_date'] . "</td>
            <td>". $row['intrest'] . "</td>
            <td>". $row['loan_name'] . "</td>
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
                            <h5 class="card-title">Sorted according to Loan Type</h5>
                            <!-- <p class="card-text">Some taste's of your choice.</p> -->
                            <p class="d-inline-flex gap-1">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#category" aria-expanded="false" aria-controls="collapseExample">
                                    Show/Hide
                                </button>
                            </p>
                            <div class="collapse" id="category">
                                <?php
                            $sql = "SELECT loan.name AS loan_name, SUM(l.amount) AS total_amount, COUNT(l.id) AS loan_count FROM loans l JOIN _loans loan ON l.loans_id = loan.id WHERE l.user_id = '$uid' GROUP BY l.loans_id;";
                            $result = mysqli_query($conn, $sql);
                            $sno = 0;
                            $r=true;
                            while($row = mysqli_fetch_assoc($result)){
                                $r=false;
                                $sno = $sno + 1;
                                echo '<div class="card card-body m-3">
                                '.$row['loan_name'].' : Rs.'.$row['total_amount'].' spent
                                <div>Count : '.$row['loan_count'].' </div>
                                </div>';
                            } 
                            if($r){
                                echo "<div class='card card-body alert alert-warning'>No Loan Found! Try to Add Some Loans.</div>" ;
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
                            $sql = "SELECT freq.name AS frequency_name, SUM(l.amount) AS total_amount, COUNT(l.id) AS frequency_count FROM loans l JOIN _frequency freq ON l.frequency_id = freq.id WHERE l.user_id = '$uid' GROUP BY l.frequency_id;";
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
                                echo "<div class='card card-body alert alert-warning'>No Loans Found! Try to Add Some Loans.</div>" ;
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