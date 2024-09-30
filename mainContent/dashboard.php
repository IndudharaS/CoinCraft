<div class="container mx-auto">
<?php
    $uid=$_SESSION['slno'];
?>


<!-- <div class="container">
    <div class="container p-4 ">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class=" p-3 p-lg-5 pt-lg-3">
                <h2 class="display-4 fw-bold lh-1 text-body-emphasis">Hey <?php echo $_SESSION['first_name'] ?>!</h2>
                <hr class="my-4 w-25 mx-5">
                <p class="lead">Welcome to your personalized User Dashboard, where the journey of expense management
                    becomes a delightful adventure. Here, embark on a seamless voyage of financial empowerment, guided
                    by intuitive tools crafted to elevate your fiscal experience. Dive into a realm of detailed
                    insights, illuminating the path to wiser spending and brighter financial horizons. With tailored
                    features at your fingertips, take command of your financial journey with grace and confidence.
                    Collaborate effortlessly with your team, fostering a culture of transparency and shared success.
                    Join us on this captivating expedition towards financial mastery, where every interaction brings you
                    closer to achieving your dreams within the enchanting realm of our User Dashboard.</p>
            </div>
        </div>
    </div>
</div>

<div class="container"><hr></div>

<div class="container p-5">
    <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Daily Expense</h5>
                    <p class="card-text">
                    <?php
                        $sql = "SELECT u.id AS user_id, u.first_name, u.last_name, u.email, SUM(de.amount) AS total_expenditure FROM users u LEFT JOIN daily_expenditure de ON u.id = de.user_id WHERE u.id = $uid GROUP BY u.id";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while($row = mysqli_fetch_assoc($result)){
                        echo  '<h2>'. $row['total_expenditure'] .'</h2>'; 
                        } 
                    ?>
                    </p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="container mt-5 ">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <!-- <h5 class="card-title">Left Column</h5>
            <p class="card-text">Content goes here...</p>
            <button class="btn btn-primary"><i class="fas fa-plus"></i></button> -->
            <div class=" p-3 p-lg-5 pt-lg-3">
                <h2 class="display-4 mx-5 fw-bold">Hey <?php echo $_SESSION['first_name'] ?>!</h2>
                <!-- <hr class="my-4  mx-5"> -->
                <hr>
                <p class="lead">Welcome to your personalized User Dashboard, where the journey of expense management
                    becomes a delightful adventure. Here, embark on a seamless voyage of financial empowerment, guided
                    by intuitive tools crafted to elevate your fiscal experience. Dive into a realm of detailed
                    insights, illuminating the path to wiser spending and brighter financial horizons. With tailored
                    features at your fingertips, take command of your financial journey with grace and confidence.
                    Collaborate effortlessly with your team, fostering a culture of transparency and shared success.
                    Join us on this captivating expedition towards financial mastery, where every interaction brings you
                    closer to achieving your dreams within the enchanting realm of our User Dashboard.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row mt-5 pt-5">
          <div class="col-md-12 mb-3 w-75">
            <div class="card text-center">
              <div class="card-body">
                <h4 class="card-title">Daily Expense</h4>
                <p class="card-text"> <h2>&#8377; <?php
                        $sql = "SELECT u.id AS user_id, u.first_name, u.last_name, u.email, SUM(de.amount) AS total_expenditure FROM users u LEFT JOIN daily_expenditure de ON u.id = de.user_id WHERE u.id = $uid GROUP BY u.id";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while($row = mysqli_fetch_assoc($result)){
                        echo   $row['total_expenditure'] ; 
                        } 
                    ?></h2></p>
                <a href="dailyExpenditure.php" class="btn btn-primary">Add Expense ?</a>
              </div>
            </div>
          </div>
          <div class="col-md-12 mb-3 w-75">
            <div class="card text-center">
              <div class="card-body">
                <h4 class="card-title">Loans</h4>
                <p class="card-text"><h2>&#8377; <?php
                        $sql = "SELECT u.id AS user_id, u.first_name, u.last_name, u.email, SUM(de.amount) AS total_expenditure FROM users u LEFT JOIN loans de ON u.id = de.user_id WHERE u.id = $uid GROUP BY u.id";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while($row = mysqli_fetch_assoc($result)){
                        echo   $row['total_expenditure'] ; 
                        } 
                    ?></h2></p>
                <a href="loans.php" class="btn btn-primary">Add Loan ?</a>
              </div>
            </div>
          </div>
          <div class="col-md-12 mb-3 w-75">
            <div class="card text-center">
              <div class="card-body">
                <h4 class="card-title">Insurance</h4>
                <p class="card-text"><h2>&#8377; <?php
                        $sql = "SELECT u.id AS user_id, u.first_name, u.last_name, u.email, SUM(de.premium) AS total_expenditure FROM users u LEFT JOIN insurance de ON u.id = de.user_id WHERE u.id = $uid GROUP BY u.id";
                        $result = mysqli_query($conn, $sql);
                        $sno = 0;
                        while($row = mysqli_fetch_assoc($result)){
                        echo   $row['total_expenditure'] ; 
                        } 
                    ?></h2></p>
                <a href="insurance.php" class="btn btn-primary">Add insurance ?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>