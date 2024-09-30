<div class="container" style="min-height:610px;">
    <?php

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `_star` WHERE `id` = $sno";
    $result = mysqli_query($conn, $sql);
  }


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['snoEdit'])){// Update the record
        $sno = $_POST["snoEdit"];
        $ASNE = $_POST["ASNE"];
        $ASDE = $_POST["ASDE"];
        // $AUEME = $_POST["AUEME"];
        // $AUPSE = $_POST["AUPSE"];
    
      // Sql query to be executed
    //   $sql = "INSERT INTO `users` ( `first_name`, `last_name`, `email`, `password`) VALUES ( '$AUFN', '$AULN', '$AUEM', '$AUPS')";
    //   $result = mysqli_query($conn, $sql);
      // Sql query to be executed
      $sql = "UPDATE `_star` SET `name` = '$ASNE', `description` = '$ASDE' WHERE `id` = '$sno'";
      $result = mysqli_query($conn, $sql);
      if($result){
        echo '<div class="alert alert-success alert-dismissible fade show m-4" role="alert">
          <strong>Success!</strong> Star Updated successfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    else{
        echo "We could not update the record successfully";
    }
    }
    else{
        $ASN = $_POST["ASN"];
        $ASD = $_POST["ASD"];
    
      // Sql query to be executed
      $sql = "INSERT INTO `_star` ( `name`, `description`) VALUES ( '$ASN', '$ASD')";
      $result = mysqli_query($conn, $sql);
    
       
      if($result){ 
          echo '<div class="alert alert-success alert-dismissible fade show m-4" role="alert">
          <strong>Success!</strong> Star added successfully.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
      }
      else{
          echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
      } 
    }
    }

?>

    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="row g-2  mb-3 ">
                            <div class="col-md-6">
                                <div class="input-group  ">
                                    <span class="input-group-text">Star Name</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="ASNE" placeholder="Username"
                                            name="ASNE">
                                        <label for="ASNE">Star name</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2  mb-3 ">
                            <div class="col-md-10">
                                <div class="input-group  ">
                                    <span class="input-group-text">Description</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="ASDE" placeholder="Username"
                                            name="ASDE">
                                        <label for="ASDE">Description</label>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6">
                            <div class="input-group  ">
                                <span class="input-group-text">Password</span>
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="AUPSE" placeholder="Username"
                                        name="AUPSE">
                                    <label for="AUPSE">Password</label>
                                </div>
                            </div>
                        </div> -->
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Star</button>
                    <button type="reset" class="btn btn-outline-primary ml-3">Clear</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- <div class="container translate-middle"> -->
    <div class="container p-4 my-0  ">
        <div class="card text-center w-75 mx-auto">
            <div class="card-body">
                <h5 class="card-title">Star Count :
                    <?php
                $sql = 'SELECT COUNT(*) AS total_star FROM _star';
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while($row = mysqli_fetch_assoc($result)){
                   echo $row['total_star'];
                } 
                ?>
                </h5>
            </div>
        </div>
    </div>
    <!-- </div> -->

    <!-- <div class="container">
    <div class="container">
        <hr class="w-100">
    </div>
</div> -->


    <div class="container">
        <div class="container my-3">
            <p class="d-inline-flex gap-1">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#add"
                    aria-expanded="false" aria-controls="collapseExample">
                    Add Star? click me
                </button>
            </p>
            <div class="collapse" id="add">
                <div class="card card-body">
                    <div class="container px-5 pt-3  ">
                        <h2>Add User</h2>
                        <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
                            <div class="row g-2  mb-3 ">
                                <div class="col-md-6">
                                    <div class="input-group  ">
                                        <span class="input-group-text">Star Name</span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="amount" placeholder="Username"
                                                name="ASN">
                                            <label for="amount">Star Name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2  mb-3 ">
                                <div class="col-md-10">
                                    <div class="input-group  ">
                                        <span class="input-group-text">Description</span>
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="amount" placeholder="Username"
                                                name="ASD">
                                            <label for="amount">Description</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Star</button>
                            <button type="reset" class="btn btn-outline-primary ml-3">Clear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="container">
            <hr class="w-100">
        </div>
    </div>

    <div class="container my-3 px-5 mt-4">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>SLNO</th>
                    <th>Star Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $sql = "SELECT * FROM `_star`";
                    $result = mysqli_query($conn, $sql);
                    $sno = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $sno = $sno + 1;
                        echo "<tr>
                        <th scope='row'>". $sno . "</th>
                        <td>". $row['name'] . "</td>
                        <td>". $row['description'] . "</td>
                        <td><button type='button' class='btn btn-primary btn-sm edit' data-bs-toggle='modal' data-bs-target='#edit' id=".$row['id'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['id'].">Delete</button>  </td>
                        </tr>";
                    } 
                    ?>
            </tbody>
        </table>
    </div>

    <!-- <div class="container">
    <div class="container">
        <hr class="w-100">
    </div>
</div> -->


</div>
<div class="container px-4">
    <hr>
    <p class="text-center">&copy; Copyright 2024</p>
</div>