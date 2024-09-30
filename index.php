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
        include "Partials/_navbar.php";
        include "Partials/_loginmodal.php";
    ?>
    <div class="px-4 py-5 my-5 text-center" id="home">
        <h1 class="display-5 fw-bold text-body-emphasis">CoinCraft - Your Expense Tracker</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">At CoinCraft, we've developed a comprehensive expense tracking platform tailored to
                your
                financial needs. With our intuitive interface and powerful tools, you can effortlessly monitor your
                spending habits, categorize expenses, and gain valuable insights into your financial health. Take
                control of your finances today with CoinCraft and embark on a journey towards greater financial
                freedom and stability.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-outline-primary btn-lg px-4 gap-3" data-bs-toggle="modal"
                    data-bs-target="#loginmodal">Get Started <svg xmlns="http://www.w3.org/2000/svg" width="16"
                        height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg> </button>
            </div>
        </div>
    </div>
    <div class="container container-sm ">
        <hr class="w-100">
    </div>
    <div id="features" class="container">
        <div class="container p-3" id="featured-3">
            <h1 class="text-center p-3">Features</h1>
            <div class="row g-3 row-cols-1 row-cols-lg-3">
                <div class="feature col">
                    <h3 class="fs-2 text-body-emphasis">Smart Categorization</h3>
                    <p>CoinCraft automatically categorizes your expenses, making it easy to understand where your money
                        is going. With intelligent algorithms, it accurately classifies transactions into categories
                        like food, transportation, and entertainment, saving you time and effort.</p>
                    
                </div>
                <div class="feature col">
                    <h3 class="fs-2 text-body-emphasis">Secure Data Encryption</h3>
                    <p>Rest assured knowing that your financial data is safe and secure with CoinCraft's advanced encryption technology. Your personal and transaction information is encrypted both during transit and at rest, providing peace of mind against unauthorized access.</p>
                    
                </div>
                <div class="feature col">
                    <h3 class="fs-2 text-body-emphasis">Goal Setting</h3>
                    <p>Set savings goals and milestones to work towards within CoinCraft. Whether it's saving for a vacation or an emergency fund, you can track your progress and stay motivated as you watch your savings grow.</p>
                    
                </div>
            </div>
        </div>
    </div><div class="container">
  <footer class="py-3 my-4">
    <!-- <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">About</a></li>
    </ul> -->
    <hr class="container">
    <p class="text-center text-body-secondary">&copy; 2024 Company, Inc</p>
  </footer>
</div>
    


</body>

</html>