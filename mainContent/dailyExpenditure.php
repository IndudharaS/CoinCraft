<div class="container " style="min-height:600px;">
    <?php
    $uid=$_SESSION['slno'];
    $budget = $_SESSION['budget']
?>

    <?php
if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `daily_expenditure` WHERE `id` = $sno";
    $result = mysqli_query($conn, $sql);
  }


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['snoEdit'])){// Update the record
        $sno = $_POST["snoEdit"];
        $amountEdit = $_POST["amountEdit"];
        $descriptionEdit = $_POST["descriptionEdit"];
        $dateEdit = $_POST["dateEdit"];
        $categoryEdit = $_POST["categoryEdit"];
        $paymentEdit = $_POST["paymentEdit"]; 
    
      // Sql query to be executed
      $sql = "UPDATE `daily_expenditure` SET `amount` = '$amountEdit', `description` = '$descriptionEdit', `date` = '$dateEdit', `user_id` = '$uid', `category_id` = '$categoryEdit', `payment_id` = '$paymentEdit' WHERE `daily_expenditure`.`id` = '$sno'";
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
        $amount = $_POST["amount"];
        $description = $_POST["description"];
        $date = $_POST["date"];
        $category = $_POST["category"];
        $payment = $_POST["payment"];
    
      // Sql query to be executed
        $sql = "INSERT INTO `daily_expenditure` ( `amount`, `description`, `date`, `user_id`, `category_id`, `payment_id`, `datestammp`) VALUES ( '$amount', '$description', '$date', '$uid', '$category', '$payment', current_timestamp())";
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Expense?</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="POST">
                        <input type="hidden" name="snoEdit" id="snoEdit">
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
                                        <input type="text" class="form-control" id="amountEdit" placeholder="Username"
                                            name="amountEdit">
                                        <label for="amountEdit">Amount</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Description</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="descriptionEdit"
                                            placeholder="Username" name="descriptionEdit">
                                        <label for="descriptionEdit">Description</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2  mb-3 ">
                            <div class="col-md-4">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Date</span>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="dateEdit" placeholder="Username"
                                            name="dateEdit">
                                        <label for="dateEdit">Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" id="categoryEdit"
                                        aria-label="Floating label select example" name="categoryEdit">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <!-- <option value="1">Beverages</option>
                                        <option value="2">Utilities and Bills</option>
                                        <option value="3">Transportation Costs</option>
                                        <option value="4">Housing Expenses</option> -->
                                        <?php
                                            $sql = "SELECT * FROM `_category`";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    <label for="categoryEdit">Select Category</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" id="paymentEdit"
                                        aria-label="Floating label select example" name="paymentEdit">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <!-- <option value="1">Online and Digital Payments</option>
                                        <option value="2">Cash Transactions</option>
                                        <option value="3">Credit Card Payments</option>
                                        <option value="4">Debit Card Transactions</option> -->
                                        <?php
                                            $sql = "SELECT * FROM `_payment`";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    <label for="paymentEdit">Select Payment Method</label>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Expense</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="card m-3">
        <div class="card-header text-center">
            Current Month
        </div>
        <div class="card-body">
            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <div class="card text-center">
                            <div class="row px-2">
                                <div class="col">
                                    <div class="card-body">
                                        <h5 class="card-title">Monthly Budget</h5>
                                        <h3 class="card-title">&#8377; <?php
                                            $sql = "SELECT * FROM `users` where id = $uid";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo $row['budget'];
                                            }
                                        ?> </h3>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card-body">
                                        <h5 class="card-title">Remaining Budget</h5>
                                        <h3 class="card-title">&#8377; <?php
                                            $sql = "SELECT * FROM `users` where id = $uid";
                                            $result = mysqli_query($conn, $sql);
                                            $bud=0;
                                            $sum=0;
                                            while($row = mysqli_fetch_assoc($result)){
                                                $bud = $row['budget'];
                                            }
                                            $sql = "SELECT SUM(amount) AS total_amount FROM daily_expenditure WHERE user_id = $uid AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE());";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                $sum = $row['total_amount'];
                                            }
                                            echo $bud-$sum;
                                        ?> </h3>
                                    </div>
                                </div>
                            </div>
                            <a href="profile.php" class="btn btn-primary w-75 mx-auto mb-2">Update Budget</a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">Monthly Expense</h5>
                                <h3 class="card-title">&#8377;
                                    <?php
                            $sql = "SELECT SUM(amount) AS total_amount FROM daily_expenditure WHERE user_id = $uid AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE());";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_assoc($result)){ 
                                echo $row['total_amount'];
                            }
                        ?>
                                </h3>
                                <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#aa">
                                    Details
                                </button>
                                <!-- Modal -->
                                <div class="modal modal-xl fade" id="aa" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- <div class="container my-3 px-5 mt-4"> -->
                                                <table id="example1" class="display" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>SLNO</th>
                                                            <th>Amount</th>
                                                            <th>Description</th>
                                                            <th>Date</th>
                                                            <th>Category</th>
                                                            <th>Payment Method</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 
                                                        $sql = "SELECT de.*, u.first_name AS user_name, c.name AS category_name, p.name AS payment_name FROM daily_expenditure de JOIN users u ON de.user_id = u.id JOIN _category c ON de.category_id = c.id JOIN _payment p ON de.payment_id = p.id WHERE de.user_id = $uid AND MONTH(date) = MONTH(CURRENT_DATE()) AND YEAR(date) = YEAR(CURRENT_DATE()) order by id desc;";
                                                        $result = mysqli_query($conn, $sql);
                                                        $sno = 0;
                                                        while($row = mysqli_fetch_assoc($result)){
                                                            $sno = $sno + 1;
                                                            echo "<tr>
                                                            <th scope='row'>". $sno . "</th>
                                                            <td>". $row['amount'] . "</td>
                                                            <td>". $row['description'] . "</td>
                                                            <td>". $row['date'] . "</td>
                                                            <td>". $row['category_name'] . "</td>
                                                            <td>". $row['payment_name'] . "</td>
                                                            </tr>";
                                                        } 
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- </div> -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">View Analytics</h5>
                                <h3 class="card-title">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                        class="bi bi-bar-chart" viewBox="0 0 16 16">
                                        <path
                                            d="M4 11H2v3h2zm5-4H7v7h2zm5-5v12h-2V2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1z" />
                                    </svg>
                                </h3>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#aaa">
                                    Analytics
                                </button>
                                <!-- Modal -->
                                <div class="modal modal-xl fade" id="aaa" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container p-5">
                                                    <div>
                                                        <canvas id="myChart"></canvas>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="container px-4">
        <hr>
    </div> -->

    <div class="container my-3 mx-auto">
        <p class="d-inline-flex gap-1 mx-auto">
            <button class="mx-auto btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#add"
                aria-expanded="false" aria-controls="collapseExample">
                Want to add Expense? click me,
            </button>
        </p>
        <div class="collapse" id="add">
            <div class="card card-body">
                <div class="container px-5 pt-3  ">
                    <h2>Add Expense</h2>
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
                                        <input type="text" class="form-control" id="amount" placeholder="Username"
                                            name="amount">
                                        <label for="amount">Amount</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
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
                        <div class="row g-2  mb-3 ">
                            <div class="col-md-4">
                                <div class="input-group  ">
                                    <span class="input-group-text">Enter Date</span>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="date" placeholder="Username"
                                            name="date">
                                        <label for="date">Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!-- <div class="form-floating">
                                    <select class="form-select" id="category" aria-label="Floating label select example"
                                        name="category">
                                        <option value="1">Beverages</option>
                                        <option value="2">Utilities and Bills</option>
                                        <option value="3">Transportation Costs</option>
                                        <option value="4">Housing Expenses</option>
                                    </select>
                                    <label for="category">Select Category</label>
                                </div> -->
                                <?php
                                    $sql = "SELECT * FROM `_category`";
                                    $result = mysqli_query($conn, $sql);
                                    echo '<div class="form-floating">
                                        <select class="form-select" id="payment" aria-label="Floating label select example"name="category">';
                                        while($row = mysqli_fetch_assoc($result)){ 
                                            echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                        }
                                        echo'</select>
                                        <label for="payment">Select category</label>
                                        </div>';
                                ?>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <select class="form-select" id="payment" aria-label="Floating label select example"
                                        name="payment">
                                        <!-- <option selected>Open this select menu</option> -->
                                        <!-- <option value="1">Online and Digital Payments</option>
                                        <option value="2">Cash Transactions</option>
                                        <option value="3">Credit Card Payments</option>
                                        <option value="4">Debit Card Transactions</option> -->
                                        <?php
                                            $sql = "SELECT * FROM `_payment`";
                                            $result = mysqli_query($conn, $sql);
                                            while($row = mysqli_fetch_assoc($result)){ 
                                                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                    <label for="payment">Select Payment Method</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Expense</button>
                        <button type="reset" class="btn btn-outline-primary ml-3">Clear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- <div class="container">
    <?php
        $sql = "SELECT * FROM `_category`";
        $result = mysqli_query($conn, $sql);
        echo '<div class="form-floating">
            <select class="form-select" id="payment" aria-label="Floating label select example"name="payment">';
            while($row = mysqli_fetch_assoc($result)){ 
                echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
            }
            echo'</select>
            <label for="payment">Select Payment Method</label>
            </div>';
    ?>
</div> -->


    <div class="container my-3 px-5 mt-4">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>SLNO</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Payment Method</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
          $sql = "SELECT de.*, u.first_name AS user_name, c.name AS category_name, p.name AS payment_name
            FROM daily_expenditure de
            JOIN users u ON de.user_id = u.id
            JOIN _category c ON de.category_id = c.id
            JOIN _payment p ON de.payment_id = p.id
            WHERE de.user_id = '$uid'
            order by id desc;";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['amount'] . "</td>
            <td>". $row['description'] . "</td>
            <td>". $row['date'] . "</td>
            <td>". $row['category_name'] . "</td>
            <td>". $row['payment_name'] . "</td>
            <td><button type='button' class='btn btn-primary btn-sm edit' data-bs-toggle='modal' data-bs-target='#edit' id=".$row['id'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['id'].">Delete</button>  </td>
            </tr>";
        } 
          ?>
            </tbody>
        </table>
    </div>


    <div class="card text-center m-3">
        <!-- <div clas  -->
        <div class="card-body">
            <div class="row g-2  mb-3 ">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sorted according to Category</h5>
                            <p class="card-text">Some taste's of your choice.</p>
                            <p class="d-inline-flex gap-1">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#category" aria-expanded="false" aria-controls="collapseExample">
                                    View
                                </button>
                            </p>
                            <div class="collapse" id="category">
                                <?php
                            $sql = "SELECT c.name AS category_name, SUM(de.amount) AS total_amount, COUNT(de.id) AS expenditure_count FROM daily_expenditure de JOIN _category c ON de.category_id = c.id WHERE de.user_id = '$uid' GROUP BY de.category_id;";
                            $result = mysqli_query($conn, $sql);
                            $sno = 0;
                            $r=true;
                            while($row = mysqli_fetch_assoc($result)){
                                $r=false;
                                $sno = $sno + 1;
                                echo '<div class="card card-body m-3">
                                '.$row['category_name'].' : Rs.'.$row['total_amount'].' spent
                                <div>Count : '.$row['expenditure_count'].' </div>
                                </div>';
                            } 
                            if($r){
                                echo "<div class='card card-body alert alert-warning'>No Expense Found! Try to Add Some Expenses.</div>" ;
                            }
                        ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sorted according to Payment Methods</h5>
                            <p class="card-text">Be familar with all payment methods.</p>
                            <p class="d-inline-flex gap-1">
                                <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseExample" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    View
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample">
                                <?php
                            $sql = "SELECT p.name AS payment_name, SUM(de.amount) AS total_amount, COUNT(de.id) AS expenditure_count FROM daily_expenditure de JOIN _payment p ON de.payment_id = p.id WHERE de.user_id = '$uid' GROUP BY de.payment_id";
                            $result = mysqli_query($conn, $sql);
                            $sno = 0;
                            $r=true;
                            while($row = mysqli_fetch_assoc($result)){
                                $r=false;
                                $sno = $sno + 1;
                                echo '<div class="card card-body m-3">
                                '.$row['payment_name'].' : Rs.'.$row['total_amount'].' spent
                                <div> Frequency : '.$row['expenditure_count'].' </div>
                                </div>';
                            } 
                            if($r){
                                echo "<div class='card card-body alert alert-warning'>No Expense Found! Try to Add Some Expenses.</div>" ;
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

<!-- <div class="container p-5">
    <div>
        <canvas id="myChart"></canvas>
    </div>
</div> -->




<div class="container px-4">
    <hr>
    <p class="text-center">&copy; Copyright 2024</p>
</div>

<div class="filter-container">
    <form method="GET" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
        <label for="startDate">Start Date:</label>
        <input type="date" id="startDate" name="startDate">
        <label for="endDate">End Date:</label>
        <input type="date" id="endDate" name="endDate">
        <button type="submit">Filter</button>
    </form>
</div>

<!-- <?php
include 'hello.php';
?> -->

<?php

if(isset($_GET['startDate']) && isset($_GET['endDate'])) {
    // Retrieve start date and end date from form
    $startDate = $_GET['startDate'];
    $endDate = $_GET['endDate'];

    // Prepare SQL statement to fetch filtered expenses
    $sql = "SELECT * FROM daily_expenditure WHERE date BETWEEN '$startDate' AND '$endDate'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table>";
        echo "<tr><th>ID</th><th>Amount</th><th>Description</th><th>Date</th></tr>";
        while($row = $result->fetch_assoc()) {
            $sum += $row["amount"];
            echo "<tr><td>".$row["id"]."</td><td>".$row["amount"]."</td><td>".$row["description"]."</td><td>".$row["date"]."</td></tr>";
        }
        echo "<tr><td colspan='4'><strong>Total:</strong> $sum</td></tr>"; // Display total sum
        echo "</table>";
    } else {
        echo "0 results";
    }
}

?>