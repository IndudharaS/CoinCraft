<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location:index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoinCraft - Your Expense Tracker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
        include "Partials/_dbconnect.php";
        include "Partials/_navbar.php";
        $id = $_SESSION['slno'];
    ?>
            <?php
$method = $_SERVER["REQUEST_METHOD"];
$showAlert = false;
if($method == "POST"){
    $amount = $_POST['amount'];
    $desc = $_POST['desc'];
    $cat = $_POST['cat'];
    $pay = $_POST['pay'];
    $sql = "INSERT INTO `daily_expnediture` ( `daily_expnediture_amount`, `daily_expnediture_date`, `daily_expnediture_desc`, `daily_expnediture_user_id`, `daily_expnediture_category_id`, `daily_expnediture_payment_method_id`) VALUES ( '$amount', current_timestamp(), '$desc', '$id', '$cat', '$pay');";
    $result = mysqli_query($conn,$sql);
    $showAlert = true;
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show m-4" role="alert">
        <strong>Success! </strong> Your thread has been added, please wait while someone respond.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }

}


?>

    <div class="container">
        <h1>Welcome <?php echo $_SESSION['name'];?> to daily expenditure</h1>
        <h1>Welcome <?php echo $_SESSION['slno'];?></h1>








        <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="POST">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="amount">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="textarea" class="form-control" id="floatingInput" placeholder="name@example.com"name="desc">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="cat">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label for="floatingSelect">Works with selects</label>
            </div>
            <div class="form-floating">
                <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="pay">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label for="floatingSelect">Works with selects</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <?php
        $id = $_SESSION['slno'];
        echo ' User id '.$id;
        $sql = "SELECT * FROM daily_expnediture where daily_expnediture_user_id = $id";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
                $cid = $row['daily_expnediture_category_id'];
                $pid = $row['daily_expnediture_payment_method_id'];
                $desc = $row['daily_expnediture_desc'];
                $date = $row['daily_expnediture_date'];

                echo '<div class="card">
                <div class="card-header"> Category id :
                  '.$cid.'
                </div>
                <div class="card-body">
                  <h5 class="card-title"> Payment Method : '.$pid.'</h5>
                  <p class="card-text"> Description : '.$desc.'</p>
                  <p class="card-text"> Date : '.$date.'</p>
                  <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>';
        }

        ?>






    </div>
</body>

</html>